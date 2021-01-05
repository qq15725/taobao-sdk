<?php

namespace Taobao;

use SDK\Kernel\Support\Collection;

class Converter
{
    /**
     * 商品转换
     *
     * @param array $raw
     *
     * @return array
     */
    public static function productConvert(array $raw): array
    {
        $data = new Collection($raw);

        if ($data->has('coupon_click_url')) {
            // from taobao.tbk.privilege.get
            $couponUrl = $data->get('coupon_click_url') ?: null;
            $commissionRate = $data->get('max_commission_rate') * 100;
            $couponInfo = $data->get('coupon_info');
            $couponAmount = 0;
            if (preg_match("#减(\d+)(\.\d{1,2})*元#", $couponInfo, $match)) {
                $couponAmount = intval($match[1]);
            }
        } else {
            // from taobao.tbk.dg.material.optional
            $couponUrl = $data->get('coupon_share_url') ?: null;
            $commissionRate = $data->get('commission_rate');
            $couponAmount = $data->get('coupon_amount');
            $couponInfo = $data->get('coupon_info');
        }

        $couponId = $data->get('coupon_id') ?: null;
        $shopId = $data->get('seller_id');
        $productId = $data->get('num_iid');

        return [
            'channel' => 'taobao',
            'product' => [
                'id' => $productId,
                'shop_id' => $shopId,
                'category_id' => $data->get('category_id'),
                'title' => $data->get('title'),
                'short_title' => $data->get('short_title'),
                'desc' => $data->get('desc'),
                'cover' => $data->get('pict_url'),
                'banners' => $data->get('small_images.string'),
                'sales_count' => (int)$data->get('volume'),
                'rich_text_images' => [],
                'url' => $data->get('item_url'),
            ],
            'coupon_product' => [
                'price' => $price = (float)\bcsub(
                    (float)$data->get('zk_final_price'),
                    (float)$couponAmount,
                    2
                ),
                'original_price' => (float)$data->get('zk_final_price'),
                'commission_rate' => (float)\bcdiv($commissionRate, 100, 2),
                'commission_amount' => (float)\bcmul(
                    $price,
                    \bcdiv($commissionRate, 10000, 4),
                    2
                ),
            ],
            'coupon' => [
                'id' => $couponId,
                'shop_id' => $shopId,
                'product_id' => $productId,
                'amount' => (float)$couponAmount,
                'rule_text' => $couponInfo,
                'stock' => (int)$data->has('coupon_remain_count'),
                'total' => (int)$data->get('coupon_total_count'),
                'started_at' => $data->get('coupon_start_time'),
                'ended_at' => $data->get('coupon_end_time'),
                'url' => $couponUrl,
                'raw' => $raw,
            ],
            'shop' => [
                'id' => $shopId,
                'logo' => null,
                'name' => $data->get('shop_title'),
                'type' => 'tmall',
            ]
        ];
    }

    /**
     * 订单转换
     *
     * @param array $raw
     *
     * @return array
     */
    public static function orderConvert(array $raw): array
    {
        $data = new Collection($raw);

        return [
            'no' => $data->get('trade_id'),
            'parent_no' => $data->get('trade_parent_id'),
            'site_id' => $data->get('site_id'),
            'site_name' => $data->get('site_name'),
            'adzone_id' => $data->get('adzone_id'),
            'adzone_name' => $data->get('adzone_name'),
            'product_id' => $data->get('item_id'),
            'product_cover' => $data->get('item_img'),
            'product_url' => $data->get('item_link'),
            'product_title' => $data->get('item_title'),
            'shop_title' => $data->get('seller_shop_title'),
            'type' => $data->get('order_type'),
            'terminal' => $data->get('terminal_type'),
            'amount' => (int)($data->get('alipay_total_price') * 100),
            'commission_rate' => (int)($data->get('total_commission_rate') * 100),
            'commission_amount' => (int)($data->get('total_commission_fee') * 100),
            'precommission_amount' => (int)($data->get('pub_share_pre_fee') * 100),
            'royalty_amount' => (int)($data->get('alimama_share_fee') * 100),
            'status' => $data->get('tk_status'),
            'special_id' => $data->get('special_id'),
            'relation_id' => $data->get('relation_id'),
            'clicked_at' => $data->get('click_time'),
            'paid_at' => $data->get('tb_paid_time'),
            'created_at' => $data->get('tk_create_time'),
            'settlemented_at' => $data->get('tk_earning_time'),
            'refunded' => $data->get('refund_tag') == 1,
            'raw' => $raw,
        ];
    }
}