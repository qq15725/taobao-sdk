<?php

namespace Taobao\Wireless\Share\Tpwd;

use Taobao\BaseClient;

class Tpwd extends BaseClient
{
    /**
     * taobao.wireless.share.tpwd.query( 查询解析淘口令 )
     *
     * ￥开放平台基础API不需用户授权
     *
     * 查询解析淘口令
     *
     * @link https://open.taobao.com/api.htm?docId=32461&docType=2
     *
     * @param string $passwordContent 淘口令
     *
     * @return array|object|\Psr\Http\Message\ResponseInterface|\SDK\Kernel\Support\Collection|string
     */
    public function query(string $passwordContent)
    {
        return $this->httpPost('taobao.wireless.share.tpwd.query', [
            'password_content' => $passwordContent
        ]);
    }
}