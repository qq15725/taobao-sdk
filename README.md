淘宝 SDK 封装, 调用简单、语义化增强, 文档

支持 Laravel/Lumen 

<p>
  <a href="https://github.com/qq15725/taobao-sdk" target="_blank">
    <img alt="Php-Version" src="https://img.shields.io/packagist/php-v/wxm/taobao-sdk.svg" />
  </a>
  <a href="https://github.com/qq15725/taobao-sdk" target="_blank">
    <img alt="Documentation" src="https://img.shields.io/badge/documentation-yes-brightgreen.svg" />
  </a>
  <a href="https://github.com/qq15725/taobao-sdk/graphs/commit-activity" target="_blank">
    <img alt="Maintenance" src="https://img.shields.io/badge/Maintained%3F-yes-green.svg" />
  </a>
  <a href="https://github.com/qq15725/taobao-sdk/blob/master/LICENSE" target="_blank">
    <img alt="License: MIT" src="https://img.shields.io/badge/License-MIT-yellow.svg" />
  </a>
</p>

## 安装

```bash
composer require wxm/taobao-sdk
```

## 使用

```php
<?php

use Taobao\Application;

$taobao = new Application('app_key', 'secret_key');

// 例如 taobao.tbk.item.info.get, 其他接口同理
$taobao->tbk->item->info->get(521383533703);

// 需要用户授权的接口，例如 taobao.tbk.sc.material.optional
$taobao->withSession('session')->tbk->sc->material->optional('洗衣粉', 'site_id', 'adzone_id');
```

## 工具API

- taobao.time.get (获取淘宝系统当前时间)
- taobao.top.auth.token.create (获取Access Token)
- taobao.top.auth.token.refresh (刷新Access Token)

## 淘宝客

公用

- taobao.tbk.coupon.get (淘宝客-公用-阿里妈妈推广券详情查询)
- taobao.tbk.coupon.convert (淘宝客-推广者-单品券高效转链)
- taobao.tbk.item.info.get (淘宝客-公用-淘宝客商品详情查询(简版))
- taobao.tbk.item.click.extract (淘宝客-公用-链接解析出商品id)
- taobao.tbk.item.convert (淘宝客-推广者-商品链接转换)
- taobao.tbk.item.share.convert (淘宝客-推广者-商品三方分成链接转换)
- taobao.tbk.tpwd.create (淘宝客-公用-淘口令生成)
- taobao.tbk.tpwd.parse (淘宝客-公用-淘口令解析出原链接)
- taobao.tbk.tpwd.convert (淘宝客-推广者-淘口令解析&转链)
- taobao.tbk.shop.get (淘宝客-推广者-店铺搜索)
- taobao.tbk.shop.convert (淘宝客-推广者-店铺链接转换)
- taobao.tbk.shop.recommend.get (淘宝客-公用-店铺关联推荐)
- taobao.tbk.shop.share.convert (淘宝客-推广者-店铺三方分成链接转换)

推广者

- taobao.tbk.dg.material.optional (淘宝客-推广者-物料搜索)
- taobao.tbk.dg.optimus.material (淘宝客-推广者-物料精选)
- taobao.tbk.dg.vegas.tlj.create (淘宝客-推广者-淘礼金创建)
- taobao.tbk.dg.vegas.tlj.instance.report (淘宝客-推广者-淘礼金发放及使用报表)

服务商

- taobao.tbk.privilege.get (淘宝客-服务商-单品券高效转链)
- taobao.tbk.sc.material.optional (淘宝客-服务商-物料搜索)
- taobao.tbk.sc.invitecode.get (淘宝客-公用-私域用户邀请码生成)
- taobao.tbk.sc.publisher.info.save (淘宝客-公用-私域用户备案)
- taobao.tbk.sc.tpwd.convert (淘宝客-服务商-淘口令解析&转链)
- taobao.tbk.sc.optimus.material (淘宝客-服务商-物料精选)
- taobao.tbk.sc.shop.convert (淘宝客-服务商-店铺链接转换)
- taobao.tbk.sc.order.details.get (淘宝客-服务商-所有订单查询)
- taobao.tbk.sc.activity.info.get (淘宝客-服务商-官方活动转链)

## 官方淘宝客API

删除线标记的为已完成封装的

- taobao.tbk.trace.btoc.addtrace 淘宝客-推广者-b2c平台用户行为跟踪服务商
- taobao.tbk.trace.logininfo.add 淘宝客-推广者-登陆信息跟踪服务商
- taobao.tbk.trace.shopitem.addtrace 淘宝客-推广者-用户行为跟踪服务商
- ~~taobao.tbk.item.convert 淘宝客-推广者-商品链接转换~~
- taobao.tbk.item.recommend.get 淘宝客-公用-商品关联推荐(2020.9.30下线)
- ~~taobao.tbk.item.info.get 淘宝客-公用-淘宝客商品详情查询(简版)~~
- ~~taobao.tbk.item.share.convert 淘宝客-推广者-商品三方分成链接转换~~
- ~~taobao.tbk.shop.get 淘宝客-推广者-店铺搜索~~
- ~~taobao.tbk.shop.recommend.get 淘宝客-公用-店铺关联推荐~~
- ~~taobao.tbk.shop.convert 淘宝客-推广者-店铺链接转换~~
- ~~taobao.tbk.shop.share.convert 淘宝客-推广者-店铺三方分成链接转换~~
- taobao.tbk.rebate.auth.get 淘宝客-推广者-返利商家授权查询
- taobao.tbk.rebate.order.get 淘宝客-推广者-返利订单查询
- taobao.tbk.uatm.favorites.item.get 淘宝客-推广者-选品库宝贝信息(2020.9.30下线)
- taobao.tbk.uatm.favorites.get 淘宝客-推广者-选品库宝贝列表(2020.9.30下线)
- taobao.tbk.ju.tqg.get 淘抢购api(2020.9.30下线)
- taobao.tbk.spread.get 淘宝客-公用-长链转短链
- taobao.tbk.itemid.coupon.get 淘宝客-推广者-根据宝贝id批量查询优惠券
- ~~taobao.tbk.item.click.extract 淘宝客-公用-链接解析出商品id~~
- taobao.tbk.data.report 淘宝客-服务商-保护门槛
- ~~taobao.tbk.coupon.convert 淘宝客-推广者-单品券高效转链~~
- ~~taobao.tbk.coupon.get 淘宝客-公用-阿里妈妈推广券详情查询~~
- ~~taobao.tbk.tpwd.create 淘宝客-公用-淘口令生成~~
- taobao.tbk.content.get 淘宝客-推广者-图文内容输出(2020.9.30下线)
- taobao.tbk.adzone.create 淘宝客-推广者-创建推广位
- taobao.tbk.tpwd.mix.create 淘宝客文本淘口令
- taobao.tbk.tpwd.share.convert 淘宝客-推广者-淘口令解析&三方分成转链
- ~~taobao.tbk.tpwd.convert 淘宝客-推广者-淘口令解析&转链~~
- taobao.tbk.dg.newuser.order.get 淘宝客-推广者-新用户订单明细查询
- taobao.tbk.sc.newuser.order.get 淘宝客-服务商-新用户订单明细查询
- ~~taobao.tbk.dg.optimus.material 淘宝客-推广者-物料精选~~
- taobao.tbk.sc.adzone.create 淘宝客-服务商-创建推广者位
- ~~taobao.tbk.sc.material.optional 淘宝客-服务商-物料搜索~~
- ~~taobao.tbk.dg.material.optional 淘宝客-推广者-物料搜索~~
- taobao.tbk.dg.newuser.order.sum 淘宝客-推广者-拉新活动对应数据查询
- taobao.tbk.sc.newuser.order.sum 淘宝客-服务商-拉新活动数据查询
- taobao.tbk.content.effect.get 淘宝客-推广者-图文内容效果数据(2020.9.30下线)
- taobao.tbk.item.word.get 淘宝客-推广者-商品出词
- ~~taobao.tbk.sc.optimus.material 淘宝客-服务商-物料精选~~
- ~~taobao.tbk.sc.publisher.info.save 淘宝客-公用-私域用户备案~~
- taobao.tbk.sc.publisher.info.get 淘宝客-公用-私域用户备案信息查询
- ~~taobao.tbk.sc.invitecode.get 淘宝客-公用-私域用户邀请码生成~~
- taobao.tbk.sc.groupchat.message.send 淘宝客-服务商-手淘群发单
- taobao.tbk.sc.groupchat.create 淘宝客-服务商-手淘群创建
- taobao.tbk.sc.groupchat.get 淘宝客-服务商-手淘群查询
- taobao.tbk.tbinfo.get 淘宝客-公用-手淘注册用户判定
- taobao.tbk.tbkinfo.get 淘宝客-公用-pid校验
- taobao.tbk.relation.refund 淘宝客-推广者-维权退款订单查询
- taobao.tbk.sc.vegas.tlj.create 淘宝客-服务商-淘礼金创建
- ~~taobao.tbk.dg.vegas.tlj.create 淘宝客-推广者-淘礼金创建~~
- taobao.tbk.lightshop.tbpswd.parse 淘宝客-推广者-轻店铺淘口令解析
- taobao.tbk.activitylink.get 淘宝客-推广者-官方活动转链(2020.9.30下线)
- taobao.tbk.sc.activitylink.toolget 淘宝客-服务商-官方活动转链(2020.9.30下线)
- taobao.tbk.sc.punish.order.get 淘宝客-服务商-处罚订单查询
- taobao.tbk.dg.punish.order.get 淘宝客-推广者-处罚订单查询
- ~~taobao.tbk.tpwd.parse 淘宝客-公用-淘口令解析出原链接~~
- ~~taobao.tbk.dg.vegas.tlj.instance.report 淘宝客-推广者-淘礼金发放及使用报表~~
- taobao.tbk.order.details.get 淘宝客-推广者-所有订单查询
- ~~taobao.tbk.sc.order.details.get 淘宝客-服务商-所有订单查询~~
- ~~taobao.tbk.sc.tpwd.convert 淘宝客-服务商-淘口令解析&转链~~
- taobao.tbk.sc.relation.refund 淘宝客-服务商-维权退款订单查询
- ~~taobao.tbk.sc.shop.convert 淘宝客-服务商-店铺链接转换~~
- taobao.tbk.jzf.convert 淘宝客-推广者-官办找福利页
- taobao.tbk.kol.report.query 红人店报表查询通用接口
- taobao.tbk.kol.tab.manage 红人店tab管理接口
- taobao.tbk.material.upload 淘宝客-推广者-物料上行
- taobao.tbk.kol.material.querylist 红人店物料集合获取
- taobao.tbk.kol.shop.manage 红人店铺管理
- taobao.tbk.dg.media.daily.report 淘宝客-推广者-媒体日报(达人维度)
- taobao.tbk.dg.media.month.report 淘宝客-推广者-媒体月报(媒体维度)
- taobao.tbk.dg.media.reliable.goods 淘宝客-推广者-靠谱好货共建
- taobao.tbk.dg.media.kuaishou.daily.report 淘宝客-推广者-快手日报(达人维度)
- taobao.tbk.dt.get 淘宝客-推广者-定向投放链接
- taobao.tbk.dg.media.kol.realtime.summary 淘宝客-推广者-达人实时销量汇总数据
- taobao.tbk.dg.media.kuaishou.monthly.report 淘宝客-推广者-快手月报(达人维度)
- taobao.tbk.dg.media.top.rank.report 内容媒体-达人实时销量榜单
- taobao.tbk.sc.vegas.send.report 淘宝客-服务商-查询超级红包发放个数
- taobao.tbk.dg.vegas.send.report 淘宝客-推广者-查询超级红包发放个数
- qimen.taobao.tbk.item.rule.get 淘宝客商品展示规则获取
- taobao.tbk.dg.media.top.offline.rank.report 淘宝客-推广者-媒体达人分类目T+1销量榜单
- taobao.tbk.dg.content.media.daily.report 淘宝客-推广者-微博日报(达人维度)
- taobao.tbk.dg.content.media.monthly.report 淘宝客-推广者-微博月报(达人维度)
- taobao.tbk.activity.info.get 淘宝客-推广者-官方活动转链
- ~~taobao.tbk.sc.activity.info.get 淘宝客-服务商-官方活动转链~~
- taobao.tbk.thor.creative.launch 淘宝客-推广者-媒体智能化投放
- taobao.tbk.text.tpwd.create 淘宝客-推广者-联盟口令生成
- taobao.tbk.cp.order.details.get 淘宝客-团长-所有订单查询
- taobao.tbk.sc.cp.order.details.get 淘宝客-工具-团长-所有订单查询
- taobao.tbk.sc.live.info.get 淘宝客-服务商-直播间详情查询
- taobao.tbk.dg.live.info.get 淘宝客-推广者-直播间详情查询
- taobao.tbk.dg.cpa.report.sub.detail 淘宝客-推广者-渠道管理组团明细数据
- taobao.tbk.dg.cpa.report.detail 淘宝客-推广者-渠道管理组团汇总数据
- qimen.taobao.union.record.userinfo.get 淘宝联盟备案接入方用户信息获取
- taobao.tbk.dg.rid.report.get 淘宝客-推广者-渠道管理rid推广效果
- taobao.tbk.sc.rid.report.get 淘宝客-服务商-渠道管理rid推广效果
- taobao.tbk.dg.lockin.details.get 淘宝客-推广者-锁佣空间
- taobao.tbk.sc.lockin.details.get 淘宝客-服务商-锁佣空间
- taobao.tbk.sc.lockin.check.get 淘宝客-服务商-锁佣状态
- taobao.tbk.dg.lockin.check.get 淘宝客-推广者-锁佣状态

## 相关资源 

[官方物料列表-不定期更新](https://market.m.taobao.com/app/qn/toutiao-new/index-pc.html#/detail/10628875?_k=gpov9a)