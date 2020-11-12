<?php

namespace Taobao;

use SDK\Kernel\ServiceContainer;

/**
 * Class Application.
 *
 * @property \Taobao\Tbk\Tbk $tbk
 * @property \Taobao\Itemcats\Client $itemcats
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Auth\ServiceProvider::class,
        Tbk\ServiceProvider::class,
        Itemcats\ServiceProvider::class,
    ];

    /**
     * @var array
     */
    protected $defaultConfig = [
        'version' => '2.0',
        'format' => 'json',
        'sign_method' => 'md5',
        'partner_id' => 'top-sdk-php-20180326',
        'http' => [
            'timeout' => 10.0,
            'base_uri' => 'https://eco.taobao.com/router/rest',
            'user-agent' => 'top-sdk-php',
        ],
    ];

    public function __construct(
        string $appkey = null,
        string $appsecret = null,
        bool $sandbox = false,
        array $config = [],
        array $prepends = []
    )
    {
        parent::__construct(
            array_merge([
                'appkey' => $appkey,
                'appsecret' => $appsecret,
                'sandbox' => $sandbox,
            ], $config),
            $prepends
        );
    }

    public function getConfig()
    {
        $config = parent::getConfig();

        // 沙箱
        if ($config['sandbox'] ?? false) {
            $config['http']['base_uri'] = 'https://gw.api.tbsandbox.com/router/rest';
        }

        return $config;
    }

    public function withSession(string $session)
    {
        $app = (clone $this);

        $app->config->set('session', $session);

        return $app;
    }
}