<?php

namespace Taobao\OAuth;

use Taobao\BaseClient;

/**
 * 用户授权
 *
 * @see https://open.taobao.com/doc.htm?docId=102635&docType=1
 */
class OAuth extends BaseClient
{
    const BASE_URI = 'https://oauth.taobao.com';
    const SANDBOX_BASE_URI = 'https://oauth.tbsandbox.com';

    public function getBaseURI(bool $sanbox = false)
    {
        return $sanbox ? self::SANDBOX_BASE_URI : self::BASE_URI;
    }

    /**
     * @param string $clientId
     * @param string $redirectUri
     * @param string $view
     * @param string|null $state
     * @param bool $sanbox
     *
     * @return string
     */
    public function getAuthorizeUrl(
        string $clientId,
        string $redirectUri,
        string $view = 'wap',
        string $state = null,
        bool $sanbox = false
    )
    {
        $query = http_build_query([
            'response_type' => 'code',
            'client_id' => $clientId,
            'redirect_uri' => $redirectUri,
            'view' => $view,
            'state' => $state,
        ]);

        return $this->getBaseURI($sanbox) . '/authorize?' . $query;
    }
}