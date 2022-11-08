<?php

return [
    
    'sliderBannerMaxWidth' => [
        'lg' => [
            'width' => 1500,
            'height' => 500 ],
        'md' => [
            'width' => 900,
            'height' => 900
        ],
        'sm' => [
            'width' => 500,
            'height' => 500
        ],
        'mob' => [
            'width' => 550,
            'height' => 550
        ],
    ],

    'type_delivery' => [
        'cargo' => [
            'name' => 'Брза достава',
            'price' => '120'
        ]
    ],
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
    'routes' => [
        'kontakt' => [
            'mk' => '/kontakt',
        ],
        'za-nas' => [
            'mk' => '/za-nas',
        ],
        'faq' => [
            'mk' => '/faq',
        ],
        'dizajniraj' => [
            'mk' => '/dizajniraj',
        ],
        'politika_na_privatnost' => [
            'mk' => '/politika_na_privatnost',
        ],
        'politika_na_kolacinja' => [
            'mk' => '/politika_na_kolacinja',
        ],
    ],
    'narachka_columns' => ['phone', 'address', 'city', 'paid', 'nacin_na_plakanje' , 'tracking_code', 'doc_articles', 'total', 'naracka_ispratena_na', 'naracka_platena_na', 'posta']

];
