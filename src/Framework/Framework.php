<?php
/*
 * WrathTools by SDPRO DEV
 * @author Christopher Ciampoli
 *
 */
namespace Framework;

use Exception;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolverInterface;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcherInterface;

/**
 * Class Framework
 * @package Framework
 */
class Framework
{
    private UrlMatcherInterface         $matcher;
    private ControllerResolverInterface $controllerResolver;
    private ArgumentResolverInterface   $argumentResolver;
    private EventDispatcherInterface    $dispatcher;

    public function __construct(
        UrlMatcherInterface $matcher,
        ControllerResolverInterface $controllerResolver,
        ArgumentResolverInterface $argumentResolver,
        EventDispatcherInterface $dispatcher
    )
    {
        $this->matcher = $matcher;
        $this->controllerResolver = $controllerResolver;
        $this->argumentResolver = $argumentResolver;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param Request $request
     * @return false|mixed|Response
     */
    public function handle(Request $request)
    {
        $this->matcher->getContext()->fromRequest($request);
        $listeners = $this->dispatcher->getListeners();
        print_r($listeners);die;
        try {
            $request->attributes->add($this->matcher->match($request->getPathInfo()));

            $controller = $this->controllerResolver->getController($request);
            $arguments  = $this->argumentResolver->getArguments($request, $controller);

            return call_user_func_array($controller, $arguments);
        } catch (ResourceNotFoundException $exception) {
            return new Response('Not Found' . $exception->getMessage(), 404);
        } catch (Exception $exception) {
            return new Response('An error occurred' . $exception->getMessage(), 500);
        }
    }
}