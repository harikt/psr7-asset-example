<?php
namespace Hkt\Psr7AssetExample\Container;

use Hkt\Psr7AssetExample\Middleware\Welcome;

class WelcomeFactory
{
    public function __invoke($container)
    {
        return new Welcome(
            $container->get('Zend\Expressive\Template\TemplateRendererInterface'),
            $container->get('Interop\Http\Factory\ResponseFactoryInterface')
        );
    }
}
