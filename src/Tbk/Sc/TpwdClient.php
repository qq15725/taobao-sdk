<?php

namespace Taobao\Tbk\Sc;

use Taobao\BaseClient;

class TpwdClient extends BaseClient
{
    /**
     * taobao.tbk.sc.tpwd.convert (淘宝客-服务商-淘口令解析&转链)
     *
     * ￥开放平台免费API 需要授权
     *
     * 支持通过淘口令解析商品id，并提供对应的淘客转链接
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=43873
     *
     * @param string $passwordContent
     * @param int $siteId
     * @param int $adzoneId
     * @param null|string $dx
     *
     * @return array
     */
    public function convert(string $passwordContent, int $siteId, int $adzoneId, ?string $dx = null)
    {
        return $this->httpPostWithSession('taobao.tbk.sc.tpwd.convert', [
            'password_content' => $passwordContent,
            'site_id' => $siteId,
            'adzone_id' => $adzoneId,
            'dx' => $dx,
        ]);
    }
}