<?php

namespace Taobao;

use SDK\Kernel\Support\Collection;

class Converter
{
    /**
     * 商品数据转换成统一的数据格式
     *
     * @param array $raw
     * @param null $apiType
     * @param bool $retainRaw
     *
     * @return array
     */
    public static function product(array $raw, $apiType = null, $retainRaw = true): array
    {
        if (!$raw) {
            return [];
        }

        if (isset($raw[0])) {
            foreach ($raw as &$itemRaw) {
                $itemRaw = self::product($itemRaw, $apiType, $retainRaw);
            }
            return $raw;
        }

        $data = new Collection($raw);

        switch ($apiType) {
            case 'taobao.tbk.privilege.get':
                $couponInfo = $data->get('coupon_info');
                $couponAmount = 0;
                if (preg_match("#减(\d+)(\.\d{1,2})*元#", $couponInfo, $match)) {
                    $couponAmount = intval($match[1]);
                }
                $data = [
                    'id' => $productId = $data->get('item_id', $data->get('num_iid')),
                    'shop_id' => $shopId = $data->get('seller_id'),
                    'category_id' => $data->get('category_id'),
                    'title' => $data->get('title'),
                    'short_title' => $data->get('short_title'),
                    'desc' => $data->get('desc'),
                    'cover' => $data->get('pict_url'),
                    'banners' => $data->get('small_images.string'),
                    'sales_count' => (int)$data->get('volume'),
                    'rich_text_images' => [],
                    'url' => $data->get('item_url'),
                    'coupons' => [
                        [
                            'id' => $data->get('coupon_id'),
                            'shop_id' => $shopId,
                            'product_id' => $productId,
                            'amount' => (float)$couponAmount,
                            'rule_text' => $couponInfo,
                            'stock' => (int)$data->has('coupon_remain_count'),
                            'total' => (int)$data->get('coupon_total_count'),
                            'started_at' => $data->get('coupon_start_time'),
                            'ended_at' => $data->get('coupon_end_time'),
                            'url' => $data->get('coupon_click_url'),
                            'coupon_product' => [
                                'price' => $price = (float)\bcsub(
                                    (float)$data->get('zk_final_price'),
                                    (float)$couponAmount,
                                    2
                                ),
                                'original_price' => (float)$data->get('zk_final_price'),
                                'commission_rate' => (float)\bcdiv($commissionRate = $data->get('max_commission_rate') * 100, 100, 2),
                                'commission_amount' => (float)\bcmul(
                                    $price,
                                    \bcdiv($commissionRate, 10000, 4),
                                    2
                                ),
                            ],
                        ]
                    ],
                    'shop' => [
                        'id' => $shopId,
                        'logo' => null,
                        'name' => $data->get('shop_title'),
                        'type' => 'tmall',
                    ]
                ];
                break;
            case 'taobao.tbk.dg.optimus.material': // 淘宝客-推广者-物料精选
                $data = [
                    'id' => $productId = $data->get('item_id'),
                    'shop_id' => $shopId = $data->get('seller_id'),
                    'category_id' => $data->get('category_id'),
                    'title' => $data->get('title'),
                    'short_title' => $data->get('short_title'),
                    'desc' => $data->get('item_description'),
                    'cover' => $data->get('pict_url'),
                    'banners' => $data->get('small_images.string'),
                    'sales_count' => (int)$data->get('volume'),
                    'rich_text_images' => [],
                    'url' => $data->get('item_url'),
                    'coupons' => [
                        [
                            'id' => $data->get('coupon_id'),
                            'shop_id' => $shopId,
                            'product_id' => $productId,
                            'amount' => (float)($couponAmount = $data->get('coupon_amount')),
                            'rule_text' => $data->get('coupon_info'),
                            'stock' => (int)$data->has('coupon_remain_count'),
                            'total' => (int)$data->get('coupon_total_count'),
                            'started_at' => $data->get('coupon_start_time')
                                ? date('Y-m-d H:i:s', $data->get('coupon_start_time') / 1000)
                                : null,
                            'ended_at' => $data->get('coupon_end_time')
                                ? date('Y-m-d H:i:s', $data->get('coupon_end_time') / 1000)
                                : null,
                            'url' => $data->get('coupon_share_url'),
                            'coupon_product' => [
                                'price' => $price = (float)\bcsub(
                                    (float)$data->get('zk_final_price'),
                                    (float)$couponAmount,
                                    2
                                ),
                                'original_price' => (float)$data->get('zk_final_price'),
                                'commission_rate' => (float)\bcdiv($commissionRate = $data->get('commission_rate') * 100, 100, 2),
                                'commission_amount' => (float)\bcmul(
                                    $price,
                                    \bcdiv($commissionRate, 10000, 4),
                                    2
                                ),
                            ],
                        ]
                    ],
                    'shop' => [
                        'id' => $shopId,
                        'logo' => null,
                        'name' => $data->get('shop_title'),
                        'type' => 'tmall',
                    ]
                ];
                break;
            case 'taobao.tbk.item.info.get':
            case 'taobao.tbk.dg.material.optional': // 淘宝客-推广者-物料搜索
                $data = [
                    'id' => $productId = $data->get('num_iid'),
                    'shop_id' => $shopId = $data->get('seller_id'),
                    'category_id' => $data->get('category_id'),
                    'title' => $data->get('title'),
                    'short_title' => $data->get('short_title'),
                    'desc' => $data->get('desc'),
                    'cover' => $data->get('pict_url'),
                    'banners' => $data->get('small_images.string'),
                    'sales_count' => (int)$data->get('volume'),
                    'rich_text_images' => [],
                    'url' => $data->get('item_url'),
                    'coupons' => [
                        [
                            'id' => $data->get('coupon_id'),
                            'shop_id' => $shopId,
                            'product_id' => $productId,
                            'amount' => (float)($couponAmount = $data->get('coupon_amount')),
                            'rule_text' => $data->get('coupon_info'),
                            'stock' => (int)$data->has('coupon_remain_count'),
                            'total' => (int)$data->get('coupon_total_count'),
                            'started_at' => $data->get('coupon_start_time'),
                            'ended_at' => $data->get('coupon_end_time'),
                            'url' => $data->get('coupon_share_url'),
                            'coupon_product' => [
                                'price' => $price = (float)\bcsub(
                                    (float)$data->get('zk_final_price'),
                                    (float)$couponAmount,
                                    2
                                ),
                                'original_price' => (float)$data->get('zk_final_price'),
                                'commission_rate' => (float)\bcdiv($commissionRate = $data->get('commission_rate'), 100, 2),
                                'commission_amount' => (float)\bcmul(
                                    $price,
                                    \bcdiv($commissionRate, 10000, 4),
                                    2
                                ),
                            ],
                        ]
                    ],
                    'shop' => [
                        'id' => $shopId,
                        'logo' => null,
                        'name' => $data->get('shop_title'),
                        'type' => 'tmall',
                    ]
                ];
                break;
        }

        if ($retainRaw) {
            $data['raw'] = $raw;
        }

        return $data;
    }

    /**
     * 订单数据转换成统一的数据格式
     *
     * @param array $raw
     * @param bool $retainRaw
     *
     * @return array
     */
    public static function order(array $raw, $retainRaw = true): array
    {
        if (!$raw) {
            return [];
        }

        if (isset($raw[0])) {
            foreach ($raw as &$itemRaw) {
                $itemRaw = self::order($itemRaw, $retainRaw);
            }
            return $raw;
        }

        $data = new Collection($raw);

        $data = [
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
            'shop_name' => $data->get('seller_shop_title'),
            'type' => $data->get('order_type'),
            'terminal' => $data->get('terminal_type'),
            'amount' => (int)bcmul($data->get('alipay_total_price'), 100),
            'commission_rate' => (int)bcmul($data->get('total_commission_rate'), 100),
            'commission_amount' => (int)bcmul($data->get('total_commission_fee'), 100),
            'precommission_amount' => (int)bcmul($data->get('pub_share_pre_fee'), 100),
            'royalty_amount' => (int)bcmul($data->get('alimama_share_fee'), 100),
            'status' => $data->get('tk_status'),
            'extension' => [
                'special_id' => $data->get('special_id'),
                'relation_id' => $data->get('relation_id'),
            ],
            'paid_at' => $data->get('tb_paid_time'),
            'created_at' => $data->get('tk_create_time'),
            'finished_at' => $data->get('tk_earning_time'),
            'settlemented_at' => null,
            'refunded' => $data->get('refund_tag') == 1,
        ];


        if ($retainRaw) {
            $data['raw'] = $raw;
        }

        return $data;
    }
}