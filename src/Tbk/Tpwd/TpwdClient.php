<?php

namespace Taobao\Tbk\Tpwd;

use Taobao\BaseClient;

class TpwdClient extends BaseClient
{
    /**
     * taobao.tbk.tpwd.create (淘宝客-公用-淘口令生成)
     *
     * ￥开放平台免费API 不需要授权
     *
     * 提供淘客生成淘口令接口，淘客提交口令内容、logo、url等参数，生成淘口令关键key如：￥SADadW￥，后续进行文案包装组装用于传播
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=31127
     *
     * @param string $text
     * @param string $url
     * @param null|string $userId
     * @param null|string $logo
     *
     * @return array
     */
    public function create(string $text, string $url, ?string $userId = null, ?string $logo = null)
    {
        return $this->httpPost('taobao.tbk.tpwd.create', [
            'text' => $text,
            'url' => $url,
            'user_id' => $userId,
            'logo' => $logo,
        ]);
    }

    /**
     * taobao.tbk.tpwd.parse (淘宝客-公用-淘口令解析出原链接)
     *
     * ￥开放平台免费API 不需要授权
     *
     * 支持通过解析淘口令输出对应的原始url链接。
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=42646
     *
     * @param string $passwordContent 需要解析的淘口令
     *
     * @return array
     */
    public function parse(string $passwordContent)
    {
        return $this->httpPost('taobao.tbk.tpwd.parse', [
            'password_content' => $passwordContent,
        ]);
    }

    /**
     * taobao.tbk.tpwd.convert (淘宝客-推广者-淘口令解析&转链)
     *
     * ￥开放平台免费API 不需要授权
     *
     * 支持通过淘口令解析商品id，并提供对应的淘客转链接
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=32932
     *
     * @param string $passwordContent 需要解析的淘口令
     * @param int $adzoneId 广告位ID
     * @param null|string $dx 1表示商品转通用计划链接，其他值或不传表示优先转营销计划链接
     *
     * @return array
     */
    public function convert(string $passwordContent, int $adzoneId, ?string $dx = null)
    {
        return $this->httpPost('taobao.tbk.tpwd.convert', [
            'password_content' => $passwordContent,
            'adzone_id' => $adzoneId,
            'dx' => $dx,
        ]);
    }
}