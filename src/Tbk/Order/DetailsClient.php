<?php

namespace Taobao\Tbk\Order;

use Taobao\BaseClient;

class DetailsClient extends BaseClient
{
    /**
     * taobao.tbk.order.details.get (淘宝客-推广者-所有订单查询)
     *
     * ￥开放平台免费API 不需要授权
     *
     * 淘宝客订单查询
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=43328
     *
     * @param string $startTime 订单查询开始时间
     * @param string $endTime 订单查询结束时间，订单开始时间至订单结束时间，中间时间段日常要求不超过3个小时，但如618、双11、年货节等大促期间预估时间段不可超过20分钟，超过会提示错误，调用时请务必注意时间段的选择，以保证亲能正常调用！
     * @param int $page 第几页
     * @param int $perPage 页大小
     * @param array $query 其他查询参数
     *
     * @return array
     */
    public function get(string $startTime, string $endTime, int $page = 1, int $perPage = 20, array $query = [])
    {
        $query += [
            'start_time' => $startTime,
            'end_time' => $endTime,
            'page_no' => $page,
            'page_size' => $perPage,
        ];

        return $this->httpPostWithSession('taobao.tbk.order.details.get', $query);
    }
}