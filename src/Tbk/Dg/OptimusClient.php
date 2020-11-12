<?php

namespace Taobao\Tbk\Dg;

use Taobao\BaseClient;

class OptimusClient extends BaseClient
{
    /**
     * taobao.tbk.dg.optimus.material (淘宝客-推广者-物料精选)
     *
     * ￥开放平台免费API 不需要授权
     *
     * 支持入参对应的“推广位”和官方提供的“物料id”，获取指定物料信息和推广链接。
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=33947
     *
     * @param int $materialId 官方的物料Id(详细物料id见：@link https://market.m.taobao.com/app/qn/toutiao-new/index-pc.html#/detail/10628875?_k=gpov9a)
     * @param int $adzoneId mm_xxx_xxx_xxx的第三位
     * @param int $page 第几页
     * @param int $perPage 页大小
     * @param array $query 其他查询参数
     *
     * @return array
     */
    public function material(int $materialId, int $adzoneId, int $page = 1, int $perPage = 20, array $query = [])
    {
        $query += [
            'adzone_id' => $adzoneId,
            'material_id' => $materialId,
            'page_no' => $page,
            'page_size' => $perPage,
        ];

        return $this->httpPost('taobao.tbk.dg.optimus.material', $query);
    }
}