<?php

namespace Hkt\Psr7AssetExample\Middleware;

use Interop\Http\Factory\ResponseFactoryInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class Welcome implements MiddlewareInterface
{
    private $template;

    private $responseFactory;

    public function __construct(
        TemplateRendererInterface $template,
        ResponseFactoryInterface $responseFactory
    ) {
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
