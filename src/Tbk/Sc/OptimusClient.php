<?php

namespace Taobao\Tbk\Sc;

use Taobao\BaseClient;

class OptimusClient extends BaseClient
{
    /**
     * taobao.tbk.sc.optimus.material (淘宝客-服务商-物料精选)
     *
     * ￥开放平台免费API 需要授权
     *
     * 服务商使用。支持入参推广者对应的“推广位”和官方提供的“物料id”，获取指定物料信息和推广者对应的推广链接。
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=37884
     *
     * @param int $materialId 官方提供的物料Id,详细物料id见: @link https://market.m.taobao.com/app/qn/toutiao-new/index-pc.html#/detail/10628875?_k=gpov9a
     * @param int $siteId mm_xxx_xxx_xxx的第2段数字
     * @param int $adzoneId mm_xxx_xxx_xxx的第3段数字
     * @param int $page 第几页
     * @param int $perPage 页大小
     * @param array $query 其他查询条件
     *
     * @return array
     */
    public function material(int $materialId, int $siteId, int $adzoneId, int $page = 1, int $perPage = 20, array $query = [])
    {
        $query += [
            'site_id' => $siteId,
            'adzone_id' => $adzoneId,
            'material_id' => $materialId,
            'page_no' => $page,
            'page_size' => $perPage,
        ];

        return $this->httpPostWithSession('taobao.tbk.sc.optimus.material', $query);
    }
}