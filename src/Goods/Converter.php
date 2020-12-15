<?php

namespace Taobao\Goods;

use SDK\Kernel\Support\Collection;

class Converter
{
    public static function convert(array $raw): array
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
}