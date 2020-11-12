<?php

namespace Taobao\Tbk\Dg\Vegas\Tlj;

use Taobao\BaseClient;

class InstanceClient extends BaseClient
{
    /**
     * taobao.tbk.dg.vegas.tlj.instance.report (淘宝客-推广者-淘礼金发放及使用报表)
     *
     * ￥开放平台免费API 不需要授权
     *
     * 淘礼金实例维度相关报表数据查询
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=43317
     *
     * @param string $rightsId 实例ID
     *
     * @return array
     */
    public function report(string $rightsId)
    {
        return $this->httpPost('taobao.tbk.dg.vegas.tlj.instance.report', [
            'rights_id' => $rightsId,
        ]);
    }
}