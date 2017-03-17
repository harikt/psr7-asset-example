<?php
namespace Hkt\Psr7AssetExample\Container;

use Aura\Di\Container;
use Aura\Di\ContainerConfigInterface;

class Common implements ContainerConfigInterface
{
    public function define(Container $di)
    {
        $di->set('Hkt\Psr7AssetExample\Middleware\Welcome', $di->lazyNew('Hkt\Psr7AssetExample\Middleware\Welcome'));

        $di->params['Hkt\Psr7AssetExample\Middleware\Welcome'] = array(
            'template' => $di->lazyGet('Zend\Expressive\Template\TemplateRendererInterface'),
            'responseFactory' => $di->lazyGet('Interop\Http\Factory\ResponseFactoryInterface'),
        );
    }

    public function modify(Container $di)
    {
        $assetLocator = $di->get('Hkt\Psr7Asset\AssetLocator');
        $assetLocator->set('hkt/psr7-asset-example', dirname(dirname(__DIR__)) . '/public');
    }
}
