<?php
/*
 * WrathTools by SDPRO DEV
 * @author Christopher Ciampoli
 *
 */

namespace Wrath\Tests;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Wrath\Framework;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentResolverInterface;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;
use Symfony\Component\Routing;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class FrameworkTest extends TestCase
{
    public function testNotFoundHandling()
    {
        $framework = $this->getFrameworkForException(new ResourceNotFoundException());

        $response = $framework->handle(new Request());

        $this->assertEquals(404, $response->getStatusCode());
    }

    public function testErrorHandling()
    {
        $framework = $this->getFrameworkForException(new RuntimeException());

        $response = $framework->handle(new Request());

        $this->assertEquals(500, $response->getStatusCode());
    }

    private function getFrameworkForException($exception): Framework
    {
        $matcher = $this->createMock(Routing\Matcher\UrlMatcherInterface::class);
        // use getMock() on PHPUnit 5.3 or below
        // $matcher = $this->getMock(Routing\Matcher\UrlMatcherInterface::class);

        $matcher
            ->expects($this->once())
            ->method('match')
            ->will($this->throwException($exception))
        ;
        $matcher
            ->expects($this->once())
            ->method('getContext')
            ->will($this->returnValue($this->createMock(Routing\RequestContext::class)))
        ;
        $controllerResolver = $this->createMock(ControllerResolverInterface::class);
        $argumentResolver = $this->createMock(ArgumentResolverInterface::class);

        return new Framework($matcher, $controllerResolver, $argumentResolver);
    }
}