<?php

namespace Taobao\Tbk\Dg;

use Taobao\BaseClient;

class MaterialClient extends BaseClient
{
    /**
     * taobao.tbk.dg.material.optional (淘宝客-推广者-物料搜索)
     *
     * ￥开放平台免费API 不需要授权
     *
     * 通用物料搜索API（导购）
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=35896
     *
     * @param string|array $keyword 商品筛选-查询词/后台类目ID数组
     * @param int $adzoneId mm_xxx_xxx_12345678三段式的最后一段数字
     * @param int $page 第几页
     * @param int $perPage 页大小
     * @param array $query 其他查询条件
     *
     * @return array
     */
    public function optional(
        $keyword,
        int $adzoneId,
        int $page = 1,
        int $perPage = 20,
        array $query = []
    )
    {
        $query += [
            'adzone_id' => $adzoneId,
            'page_no' => $page,
            'page_size' => $perPage,
            'q' => is_string($keyword) ? $keyword : null,
            'cat' => is_array($keyword) ? implode(',', $keyword) : null,
            'platform' => 2,
        ];

        return $this->httpPost('taobao.tbk.dg.material.optional', $query);
    }
}