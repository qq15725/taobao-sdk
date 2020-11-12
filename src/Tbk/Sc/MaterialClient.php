<?php

namespace Taobao\Tbk\Sc;

use Taobao\BaseClient;

class MaterialClient extends BaseClient
{
    /**
     * taobao.tbk.sc.material.optional (淘宝客-服务商-物料搜索)
     *
     * ￥开放平台免费API 需要授权
     *
     * 服务商使用。支持入参推广者对应的“推广位”、关键词和相关筛选条件，获取对应的物料信息和推广者对应的推广链接。
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=35263
     *
     * @param string|array $keyword
     * @param int $siteId
     * @param int $adzoneId
     * @param int $page
     * @param int $perPage
     * @param array $query
     *
     * @return array
     */
    public function optional(
        $keyword,
        int $siteId,
        int $adzoneId,
        int $page = 1,
        int $perPage = 20,
        array $query = []
    )
    {
        $query += [
            'adzone_id' => $adzoneId,
            'site_id' => $siteId,
            'page_no' => $page,
            'page_size' => $perPage,
            'q' => is_string($keyword) ? $keyword : null,
            'cat' => is_array($keyword) ? implode(',', $keyword) : null,
            'platform' => 2,
        ];

        return $this->httpPostWithSession('taobao.tbk.sc.material.optional', $query);
    }
}