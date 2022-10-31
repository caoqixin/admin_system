<?php

return [
    'category_type' => [
        '配件',
        '商品',
        '屏幕品牌'
    ],
    'order' => [
        'status' => [
            '待处理',
            '已预定',
            '已完成',
            '已关闭'
        ]
    ],
    'component' => [
        'brand' => [
            'Apple',
            'Samsung',
            'Huawei',
            'Honor',
            'Xiaomi',
            'Redmi',
            'Oppo',
            'Realme',
            'Vivo',
            'Oneplus',
            'Asus',
            'LG',
            'Altri'
        ],
        'quality' => [
            'service package originale', 'originale', 'rigenerato',
            'soft oled', 'hard oled',
            'incell', 'compatibile'
        ],
        'states' => [
            'on' => ['value' => 1, 'text' => '有货', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => '缺货']
        ]
    ],
    'repair' => [
        'type' => [
            'standard',
            'motherboard'
        ],
        'status' => [
            'standard' => ['未维修', '维修中', '维修完成', '已取件'],
            'motherboard' => ['已接单', '已送修', '维修完成', '已取件', '无法维修']
        ],
        // 维修服务方
        'provider' => [
            'meloriparo'
        ],
    ]
];
