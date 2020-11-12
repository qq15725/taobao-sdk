<?php

namespace Taobao\Tbk\Sc\Publisher;

use Taobao\BaseClient;

class InfoClient extends BaseClient
{
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
     * @param int $infoType 参数为1是表示渠道 参数为2时表示是会员
     * @param null|string $relationFrom 来源，取链接的来源
     * @param null|string $onlineScene 线上场景信息，1 - 微信群，2- QQ群，3 - 其他
     * @param null|string $offlineScene 线下场景信息，1 - 门店，2- 学校，3 - 工厂，4 - 其他
     * @param null|string $note 媒体侧渠道备注
     * @param null|string $registerInfo 线下备案注册信息,字段包含: 电话号码(phoneNumber，必填),省(province,必填),市(city,必填),区县街道(location,必填),详细地址(detailAddress,必填),经营类型(career,线下个人必填),店铺类型(shopType,线下店铺必填),店铺名称(shopName,线下店铺必填),店铺证书类型(shopCertifyType,线下店铺选填),店铺证书编号(certifyNumber,线下店铺选填)
     *
     * @return array
     */
    public function save(
        string $inviterCode,
        int $infoType,
        ?string $relationFrom = null,
        ?string $onlineScene = null,
        ?string $offlineScene = null,
        ?string $note = null,
        ?string $registerInfo = null
    )
    {
        return $this->httpPostWithSession('taobao.tbk.sc.publisher.info.save', [
            'inviter_code' => $inviterCode,
            'info_type' => $infoType,
            'relation_from' => $relationFrom,
            'offline_scene' => $offlineScene,
            'online_scene' => $onlineScene,
            'note' => $note,
            'register_info' => $registerInfo,
        ]);
    }
}