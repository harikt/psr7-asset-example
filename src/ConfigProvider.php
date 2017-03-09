<?php
namespace Hkt\Psr7AssetExample;

use Hkt\Psr7AssetExample\Middleware\Welcome;
use Hkt\Psr7AssetExample\Container\WelcomeFactory;

class ConfigProvider
{
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates' => [
                'paths' => [
                    'hkt-psr7-asset-example' => [
                        dirname(__DIR__) . '/templates'
                    ],
                ],
            ]
        ];
    }

    public function getDependencies()
    {
        return [
            'factories' => [
                Welcome::class => WelcomeFactory::class,
            ],
        ];
    }
}
