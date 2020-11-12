<?php

namespace Taobao\Tbk\Item;

use Taobao\BaseClient;

class ClickClient extends BaseClient
{
    /**
     * taobao.tbk.item.click.extract (淘宝客-公用-链接解析出商品id)
     *
     * ￥开放平台免费API 不需要授权
     *
     * 从长链接或短链接中解析出open_iid
     *
     * @link http://developer.alibaba.com/docs/api.htm?apiId=28156
     *
     * @param string $clickIrl 长链接或短链接
     *
     * @return array
     */
    public function extract(string $clickIrl)
    {
        return $this->httpPost('taobao.tbk.item.click.extract', [
            'click_url' => $clickIrl,
        ]);
    }
}