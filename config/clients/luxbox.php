<?php

return ['document_status' => [
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
            'name' => 'Брза достава',
            'price' => '0'
        ]
    ],
    'routes' => [
        'kontakt' => [
            'mk' => '/kontakt',
        ],
        'sorabotka-so-nas' => [
            'mk' => '/sorabotka-so-nas',
        ],
        'my-account' => [
            'mk' => '/my-account',
        ],
        'po-naracka' => [
            'mk' => '/po-naracka',
        ],
        'comming-soon' => [
            'mk' => '/naskoro',
        ],
        'faq' => [
            'mk' => '/faq',
        ],
        'politika_na_kolacinja' => [
            'mk' => '/politika_na_kolacinja',
        ],
    ],
    'sliderBannerMaxWidth' => [
        'lg' => [
            'width' => 1920,
            'height' => 720
        ],
        'md' => [
            'width' => 700,
            'height' => 700
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
    'narachka_columns' => ['phone','address','city','paid', 'nacin_na_plakanje' ,'tracking_code','doc_articles','total','naracka_ispratena_na','naracka_platena_na','posta']

];