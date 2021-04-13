<?php

namespace Tests\Controller;

use Controller\LeapYearController;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Framework\Framework;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing;
use Symfony\Component\Routing\Matcher\UrlMatcherInterface;

/**
 * Class LeapYearControllerTest
 * @covers \Controller\LeapYearController
 * @package Controller
 */
class LeapYearControllerTest extends TestCase
{
    /**
     * @uses \Framework\Framework
     * @uses \Model\LeapYear
     */
    public function testControllerResponse()
    {
        $matcher = $this->createMock(UrlMatcherInterface::class);
        // use getMock() on PHPUnit 5.3 or below
        // $matcher = $this->getMock(Routing\Matcher\UrlMatcherInterface::class);

        $matcher
            ->expects($this->once())
            ->method('match')
            ->will($this->returnValue([
                '_route' => 'is_leap_year/{year}',
                'year' => '2000',
                '_controller' => [new LeapYearController(), 'index']
            ]))
        ;
        $matcher
            ->expects($this->once())
            ->method('getContext')
            ->will($this->returnValue($this->createMock(Routing\RequestContext::class)))
        ;
        $controllerResolver = new ControllerResolver();
        $argumentResolver   = new ArgumentResolver();
        $dispatcher         = new EventDispatcher();

        $framework = new Framework($matcher, $controllerResolver, $argumentResolver, $dispatcher);

        $response = $framework->handle(new Request());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('Yep sure is!', $response->getContent());
    }
}
