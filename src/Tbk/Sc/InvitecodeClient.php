<?php

namespace Taobao\Tbk\Sc;

use Taobao\BaseClient;

class InvitecodeClient extends BaseClient
{
    /**
     * taobao.tbk.sc.invitecode.get (淘宝客-公用-私域用户邀请码生成)
     *
     * ￥开放平台免费API 需要授权
     *
     * 淘宝客邀请码生成-社交
     *
     * @link https://developer.alibaba.com/docs/api.htm?apiId=38046
     *
     * @param string $relationApp 渠道推广的物料类型
     * @param int $codeType 邀请码类型，1 - 渠道邀请，2 - 渠道裂变，3 -会员邀请
     * @param int|null $relationId 渠道关系ID
     *
     * @return array
     */
    public function get(
        string $relationApp,
        int $codeType,
        ?int $relationId = null
    )
    {
        return $this->httpPostWithSession('taobao.tbk.sc.invitecode.get', [
            'relation_app' => $relationApp,
            'code_type' => $codeType,
            'relation_id' => $relationId,
        ]);
    }
}