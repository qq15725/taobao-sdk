<?php

namespace Taobao\Tbk\Sc\Activity;

use Taobao\BaseClient;

class InfoClient extends BaseClient
{
    /**
     * taobao.tbk.sc.activity.info.get (淘宝客-服务商-官方活动转链)
     *
     * ￥开放平台免费API 需要授权
     *
     * 服务商使用。支持入参推广者对应的推广位和官方活动会场ID，获取活动信息和推广者的推广链接，包含推广长链接、短链接、淘口令、微信推广二维码地址等。改该API支持二方、三方类型的转链。官方活动会场ID，从淘宝客后台“我要推广-活动推广”中获取。
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=48417
     *
     * @param string $activityMaterialId 官方活动会场ID，从淘宝客后台“我要推广-活动推广”中获取
     * @param int $siteId mm_xxx_xxx_xxx的第2段数字
     * @param int $adzoneId mm_xxx_xxx_xxx的第3段数字
     * @param int|null $relationId 渠道关系id
     * @param null|string $unionId 自定义输入串，英文和数字组成，长度不能大于12个字符，区分不同的推广渠道
     *
     * @return array
     */
    public function get(string $activityMaterialId, int $siteId, int $adzoneId, ?int $relationId = null, ?string $unionId = null)
    {
        return $this->httpPostWithSession('taobao.tbk.sc.activity.info.get', [
            'activity_material_id' => $activityMaterialId,
            'site_id' => $siteId,
            'adzone_id' => $adzoneId,
            'relation_id' => $relationId,
            'union_id' => $unionId,
        ]);
    }
}