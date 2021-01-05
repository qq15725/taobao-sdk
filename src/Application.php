<?php

namespace Taobao;

use SDK\Kernel\ServiceContainer;

/**
 * Class Application.
 *
 * @property \Taobao\Tbk\Tbk $tbk
 * @property \Taobao\Ip\Ip $ip
 * @property \Taobao\Top\Top $top
 * @property \Taobao\Time\Time $time
 * @property \Taobao\OAuth\OAuth $oauth
 * @property \Taobao\Itemcats\Itemcats $itemcats
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Auth\ServiceProvider::class,
        Ip\ServiceProvider::class,
        Tbk\ServiceProvider::class,
        Itemcats\ServiceProvider::class,
        Top\ServiceProvider::class,
        Time\ServiceProvider::class,
        OAuth\ServiceProvider::class,
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
            'user-agent' => 'top-sdk-php',
        ],
    ];

    public function __construct(
        string $appkey = null,
        string $appsecret = null,
        array $config = [],
        array $prepends = []
    )
    {
        parent::__construct(
            array_merge([
                'appkey' => $appkey,
                'appsecret' => $appsecret,
            ], $config),
            $prepends
        );
    }

    public function getConfig()
    {
        $config = parent::getConfig();

        if (!isset($config['http']['base_uri'])) {
            $sandbox = $config['sandbox'] ?? false;
            $useHttp = $config['use_http'] ?? false;

            if ($useHttp) {
                if ($sandbox) {
                    $config['http']['base_uri'] = 'http://gw.api.tbsandbox.com/router/rest';
                } else {
                    $config['http']['base_uri'] = 'http://gw.api.taobao.com/router/rest';
                }
            } else {
                if ($sandbox) {
                    $config['http']['base_uri'] = 'https://gw.api.tbsandbox.com/router/rest';
                } else {
                    $config['http']['base_uri'] = 'https://eco.taobao.com/router/rest';
                }
            }
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