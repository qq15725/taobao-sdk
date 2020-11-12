<?php

namespace Taobao\Tbk\Privilege;

use Taobao\BaseClient;

class PrivilegeClient extends BaseClient
{
    /**
     * taobao.tbk.privilege.get (淘宝客-服务商-单品券高效转链)
     *
     * ￥开放平台免费 API必须用户授权
     *
     * 单品券高效转链API
     *
     * https://open.taobao.com/api.htm?docId=28625&docType=2&scopeId=12403
     *
     * @param int $itemId
     * @param int $siteId
     * @param int $adzoneId
     * @param null|string $relationId
     * @param null|string $specialId
     * @param null|string $externalId
     * @param int|null $platform
     * @param null|string $xid
     *
     * @return array
     */
    public function get(
        int $itemId,
        int $siteId,
        int $adzoneId,
        ?string $relationId = null,
        ?string $specialId = null,
        ?string $externalId = null,
        ?int $platform = null,
        ?string $xid = null
    )
    {
        return $this->httpPostWithSession('taobao.tbk.privilege.get', [
            'item_id' => $itemId,
            'adzone_id' => $adzoneId,
            'site_id' => $siteId,
            'relationId' => $relationId,
            'specialId' => $specialId,
            'externalId' => $externalId,
            'platform' => $platform,
            'xid' => $xid,
        ]);
    }
}