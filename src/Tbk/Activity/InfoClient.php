<?php

namespace Taobao\Tbk\Activity;

use Taobao\BaseClient;

class InfoClient extends BaseClient
{
    /**
     * taobao.tbk.activity.info.get (淘宝客-推广者-官方活动转链)
     *
     * ￥开放平台免费API 不需要授权
     *
     * 支持入参推广位和官方活动会场ID，获取活动信息和推广链接，包含推广长链接、短链接、淘口令、微信推广二维码地址等。改该API支持二方、三方类型的转链。官方活动会场ID，从淘宝客后台“我要推广-活动推广”中获取。
     *
     * @link http://developer.alibaba.com/docs/api.htm?apiId=48340
     *
     * @param string $activityMaterialId 官方活动会场ID，从淘宝客后台“我要推广-活动推广”中获取
     * @param string $adzoneId mm_xxx_xxx_xxx的第三位
     * @param string $relationId 渠道关系id
     * @param string $subPid mm_xxx_xxx_xxx 仅三方分成场景使用
     * @param string $unionId 自定义输入串，英文和数字组成，长度不能大于12个字符，区分不同的推广渠道
     *
     * @return array|object|\Psr\Http\Message\ResponseInterface|\SDK\Kernel\Support\Collection|string
     */
    public function get($activityMaterialId, $adzoneId, $relationId = null, $subPid = null, $unionId = null)
    {
        return $this->httpPost('taobao.tbk.activity.info.get', [
            'adzone_id' => $adzoneId,
            'activity_material_id' => $activityMaterialId,
            'relation_id' => $relationId,
            'union_id' => $unionId,
            'sub_pid' => $subPid,
        ]);
    }
}