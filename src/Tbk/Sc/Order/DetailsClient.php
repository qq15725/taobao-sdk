<?php

namespace Taobao\Tbk\Sc\Order;

use Taobao\BaseClient;

class DetailsClient extends BaseClient
{
    /**
     * taobao.tbk.sc.order.details.get (淘宝客-服务商-所有订单查询)
     *
     * ￥开放平台免费API 需要授权
     *
     * 服务商使用。可通过该接口查询推广者账号下对应的推广订单明细。
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=43755
     *
     * @param int $page 第几页
     * @param int $perPage 页大小
     * @param string|null $startTime 订单查询开始时间
     * @param string|null $endTime 订单查询结束时间，订单开始时间至订单结束时间，中间时间段日常要求不超过3个小时，但如618、双11、年货节等大促期间预估时间段不可超过20分钟，超过会提示错误，调用时请务必注意时间段的选择，以保证亲能正常调用！
     *
     * @param array $query 其他查询参数
     *
     * @return array
     */
    public function get(int $page = 1, int $perPage = 20, ?string $startTime = null, ?string $endTime = null, array $query = [])
    {
        $query += [
            'start_time' => $startTime ?: date('Y-m-d H:i:s', time() - 3600 * 3),
            'end_time' => $endTime ?: date('Y-m-d H:i:s'),
            'page_no' => $page,
            'page_size' => $perPage,
        ];

        return $this->httpPostWithSession('taobao.tbk.sc.order.details.get', $query);
    }
}