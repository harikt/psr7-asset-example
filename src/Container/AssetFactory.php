<?php
namespace Hkt\Psr7AssetExample\Container;

use Hkt\Psr7AssetExample\Middleware\Asset;

class AssetFactory
{
    public function __invoke($container)
    {
        return new Asset($container->get('Hkt\Psr7Asset\AssetLocator'));
    }
}
