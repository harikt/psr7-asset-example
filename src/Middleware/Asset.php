<?php
namespace Hkt\Psr7AssetExample\Middleware;

use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Psr\Http\Message\ServerRequestInterface;
use Hkt\Psr7Asset\AssetLocator;

class Asset implements MiddlewareInterface
{
    protected $locator;

    public function __construct(AssetLocator $locator)
    {
        $this->locator = $locator;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $this->locator->set('hkt/psr7-asset-example', dirname(dirname(__DIR__)) . '/public');
        return $delegate->process($request);
    }
}
