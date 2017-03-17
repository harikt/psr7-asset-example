<?php
namespace Hkt\Psr7AssetExample;

class ConfigProvider
{
    public function __invoke()
    {
        return [
            'templates' => [
                'paths' => [
                    'hkt-psr7-asset-example' => [
                        dirname(__DIR__) . '/templates'
                    ],
                ],
            ],
        ];
    }
}
