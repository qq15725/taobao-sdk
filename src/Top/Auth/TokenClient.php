<?php

namespace Taobao\Top\Auth;

use Taobao\BaseClient;

class TokenClient extends BaseClient
{
    /**
     * taobao.top.auth.token.create( 获取Access Token )
     *
     * ￥开放平台免费API 不需要授权
     *
     * 用户通过code换获取access_token，https only
     *
     * @link https://open.taobao.com/api.htm?docId=25388&docType=2
     *
     * @param string $code 授权code，grantType==authorization_code 时需要
     * @param string|null $uuid 与生成code的uuid配对
     *
     * @return array
     */
    public function create(string $code, ?string $uuid = null)
    {
        return $this->httpPost('taobao.top.auth.token.create', [
            'code' => $code,
            'uuid' => $uuid,
        ]);
    }

    /**
     * taobao.top.auth.token.refresh( 刷新Access Token )
     *
     * ￥开放平台免费API不需用户授权
     *
     * 根据refresh_token重新生成token，目前只有服务市场订购类应用可以刷新token，其他类型应用（如商家后台）使用固定时长token，不提供刷新功能。
     *
     * @link https://open.taobao.com/api.htm?docId=25387&docType=2
     *
     * @param string $refreshToken grantType==refresh_token 时需要
     *
     * @return array
     */
    public function refresh(string $refreshToken)
    {
        return $this->httpPost('taobao.top.auth.token.refresh', [
            'refresh_token' => $refreshToken,
        ]);
    }
}