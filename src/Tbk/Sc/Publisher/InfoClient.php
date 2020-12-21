<?php

namespace Taobao\Tbk\Sc\Publisher;

use Taobao\BaseClient;

class InfoClient extends BaseClient
{
    /**
     * taobao.tbk.sc.publisher.info.get (淘宝客-公用-私域用户备案信息查询)
     *
     * ￥开放平台免费API 需要授权
     *
     * 查询已生成的渠道id或会员运营id的相关信息。
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=37989
     *
     * @param int $page
     * @param int $perPage
     * @param array $query
     *
     * @return array
     */
    public function get(int $page = 1, int $perPage = 20, array $query = [])
    {
        $query += [
            'page_no' => $page,
            'page_size' => $perPage,
            'info_type' => 1,
            'relation_app' => 'common',
        ];

        return $this->httpPostWithSession('taobao.tbk.sc.publisher.info.get', $query);
    }

    /**
     * taobao.tbk.sc.publisher.info.save (淘宝客-公用-私域用户备案)
     *
     * ￥开放平台免费API 需要授权
     *
     * 淘宝客信息备案
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=37988
     *
     * @param string $inviterCode 淘宝客邀请渠道的邀请码
     * @param array $data
     *
     * @return array
     */
    public function save(string $inviterCode, array $data = [])
    {
        $data += [
            'inviter_code' => $inviterCode,
            'info_type' => 1,
        ];

        return $this->httpPostWithSession('taobao.tbk.sc.publisher.info.save', $data);
    }
}