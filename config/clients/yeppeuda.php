<?php

return [
    
    'document_status' => [
        'priemnica' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa'],
        'ispratnica' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa'],
        'narachka' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa', 'ispratena' => 'Испратена', 'dostavena' => 'Доставена', 'vratena' => 'Вратена', 'reklamacija' => 'Рекламација', 'stornirana' => 'Сторнирана'],
        'vlez' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa'],
        'izlez' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa'],
        'faktura' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa'],
        'rezervacija' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa'],
        'profaktura' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa'],
        'fiskalna' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa'],
        'povratnica' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa'],
        'povratnica_dobavuvac' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa'],
        'ostanato' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa']
    ],
    'languages' => [

        'lang1' => [

            'active' => true,

            'locale' => 'mk',

            'url_segment' => '',

            'name' => 'Македонски'

        ],
    ],


    'type_delivery' => [
        'cargo' => [
            'name' => 'Карго',
            'price' => 140,
            'price_with_card' => 140,
            'free_delivery_minimum_price' => 1200
        ]
    ],
    
    'routes' => [
        'kontakt' => [
            'mk' => '/kontakt',
        ],
        'kviz' => [
            'mk' => '/kviz',
        ],
        'faq' => [
            'mk' => '/faq',
        ],
        'za-nas' => [
            'mk' => '/za-nas',
        ],
    ],

    'sliderBannerMaxWidth' => [
        'lg' => [
            'width' => 1920,
            'height' => 740
        ],
        'md' => [
            'width' => 1000,
            'height' => 1000
        ],
        'sm' => [
            'width' => 500,
            'height' => 500
        ],
        'mob' => [
            'width' => 700,
            'height' => 700
        ],
    ],
    
    'narachka_columns' => ['phone', 'address', 'city', 'paid', 'tracking_code', 'doc_articles', 'total', 'nacin_na_plakanje', 'naracka_ispratena_na', 'naracka_platena_na', 'posta'],

    'recaptcha' => [
        'sitekey' => "6Lcx8A4aAAAAAOIT_3oidwgg25KqZhsZ3CfiBTpt",
        'secret' => "6Lcx8A4aAAAAAD8H43GRLmBV389Pf_z2ybyxvgXh",
    ],
];
