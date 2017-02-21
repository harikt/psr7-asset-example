<?php

namespace Hkt\Psr7AssetExample\Action;

use Interop\Http\Factory\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;

class WelcomeAction implements MiddlewareInterface
{
    private $router;

    private $template;

    private $responseFactory;

    public function __construct(
        RouterInterface $router,
        TemplateRendererInterface $template,
        ResponseFactoryInterface $responseFactory
    ) {
        $this->router   = $router;
        $this->template = $template;
        $this->responseFactory = $responseFactory;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $data = [];

        $response = $this->responseFactory->createResponse();
        $response = $response->withHeader('Content-Type', 'text/html');
        $response->getBody()->write($this->template->render('hkt-psr7-asset-example::welcome', $data));

        return $response;
    }
}
