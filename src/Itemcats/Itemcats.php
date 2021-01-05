<?php

namespace Taobao\Itemcats;

use Taobao\BaseClient;

class Itemcats extends BaseClient
{
    /**
     * taobao.itemcats.get (获取后台供卖家发布商品的标准商品类目)
     *
     * ￥开放平台基础API 不需要授权
     *
     * 获取后台供卖家发布商品的标准商品类目。
     *
     * @link https://jaq-doc.alibaba.com/docs/doc.htm?treeId=34&articleId=122&docType=2
     *
     * @param int|null $parentCid 父商品类目 id，0表示根节点, 传输该参数返回所有子类目。 (cids、parent_cid至少传一个)
     * @param string|array|null $cids 商品所属类目ID列表，用半角逗号(,)分隔 例如:(18957,19562,) (cids、parent_cid至少传一个)
     * @param string|null $fields 需要返回的字段列表，见ItemCat，默认返回：cid,parent_cid,name,is_parent；增量类目信息,根据fields传入的参数返回相应的结果。 features字段： 1、如果存在attr_key=freeze表示该类目被冻结了，attr_value=0,5，value可能存在2个值（也可能只有1个），用逗号分割，0表示禁编辑，5表示禁止发布
     *
     * @return array
     */
    public function get(int $parentCid = 0, $cids = null, $fields = 'cid,parent_cid,name,is_parent')
    {
        return $this->httpPost('taobao.itemcats.get', [
            'cids' => is_array($cids) ? join(',', $cids) : $cids,
            'parent_cid' => $parentCid,
            'fields' => $fields,
        ]);
    }
}