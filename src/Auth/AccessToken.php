<?php

namespace Taobao\Auth;

use Psr\Http\Message\RequestInterface;
use SDK\Kernel\AccessToken as BaseAccessToken;

class AccessToken extends BaseAccessToken
{
    protected function appendQuery($query, RequestInterface $request): array
    {
        try {
            parse_str($request->getBody()->getContents(), $data);
        } catch (\Exception $e) {
            $data = [];
        }

        $appendQuery = [
            'app_key' => $this->app->config->get('appkey'),
            'v' => $this->app->config->get('version'),
            'format' => $this->app->config->get('format'),
            'sign_method' => $this->app->config->get('sign_method'),
            'timestamp' => date("Y-m-d H:i:s"),
            'partner_id' => $this->app->config->get('partner_id'),
        ];

        return array_merge($appendQuery, [
            'sign' => $this->generateSign(
                $query + $appendQuery + $data,
                $this->app->config->get('appsecret')
            ),
        ]);
    }

    protected function generateSign($params, $secretKey)
    {
        ksort($params);
        $stringToBeSigned = $secretKey;
        foreach ($params as $k => $v) {
            if (!is_array($v) && "@" != substr($v, 0, 1)) {
                $stringToBeSigned .= "$k$v";
            }
        }
        unset($k, $v);
        $stringToBeSigned .= $secretKey;
        return strtoupper(md5($stringToBeSigned));
    }
}