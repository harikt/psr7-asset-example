<?php
namespace Hkt\Psr7AssetExample\Config;

use Aura\Di\Container;
use Aura\Di\ContainerConfigInterface;

class Common implements ContainerConfigInterface
{
    public function define(Container $di)
    {
        $di->params['Hkt\Psr7AssetExample\Action\WelcomeAction'] = [
            'router' => $di->lazyGet('Zend\Expressive\Router\RouterInterface'),
            'template' => $di->lazyGet('Zend\Expressive\Template\TemplateRendererInterface'),
            'responseFactory' => $di->lazyGet('Interop\Http\Factory\ResponseFactoryInterface')
        ];

        $di->set('Hkt\Psr7AssetExample\Action\WelcomeAction', $di->lazyNew('Hkt\Psr7AssetExample\Action\WelcomeAction'));
    }

    public function modify(Container $di)
    {
        // template locator
        $template = $di->get('Zend\Expressive\Template\TemplateRendererInterface');
        $rootPath = dirname(dirname(__DIR__));
        $template->addPath($rootPath . DIRECTORY_SEPARATOR . 'templates', 'hkt-psr7-asset-example');

        $assetLocator = $di->get('Hkt\Psr7Asset\AssetLocator');
        $assetLocator->set('hkt/psr7-asset-example', $rootPath . DIRECTORY_SEPARATOR . 'public');
    }
}
