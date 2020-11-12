<?php

namespace Taobao\Tbk\Dg\Vegas\Tlj;

use Taobao\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Taobao\Tbk\Dg\Vegas\Tlj\InstanceClient $instance
 */
class Tlj extends BaseClient
{
    /**
     * taobao.tbk.dg.vegas.tlj.create (淘宝客-推广者-淘礼金创建)
     *
     * ￥开放平台免费API 不需要授权
     *
     * 创建淘礼金
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=40173
     *
     * @param int $itemId 宝贝id
     * @param int $adzoneId 妈妈广告位Id
     * @param string $perFace 单个淘礼金面额，支持两位小数，单位元
     * @param string $sendStartTime	发放开始时间
     * @param int $totalNum 淘礼金总个数
     * @param int $userTotalWinNumLimit 单用户累计中奖次数上限
     * @param string $name 淘礼金名称，最大10个字符
     * @param bool $securitySwitch 安全开关，若不进行安全校验，可能放大您的资损风险，请谨慎选择
     * @param array $options 其他选项
     *
     * @return array
     */
    public function create(
        int $itemId,
        int $adzoneId,
        string $perFace,
        string $sendStartTime,
        int $totalNum = 1,
        int $userTotalWinNumLimit = 1,
        string $name = '淘礼金来啦',
        bool $securitySwitch = true,
        array $options = []
    )
    {
        $options += [
            'adzone_id' => $adzoneId,
            'item_id' => $itemId,
            'total_num' => $totalNum,
            'name' => $name,
            'user_total_win_num_limit' => $userTotalWinNumLimit,
            'security_switch' => $securitySwitch,
            'per_face' => $perFace,
            'send_start_time' => $sendStartTime,
        ];

        return $this->httpPost('taobao.tbk.dg.vegas.tlj.create', $options);
    }

    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["dg.vegas.tlj.{$property}"])) {
            return $this->app["dg.vegas.tlj.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Tbk service named "%s".', $property));
    }
}