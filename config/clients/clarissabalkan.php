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
    'type_delivery' => [
        'cargo' => [
            'name' => 'Брза достава',
            'price' => '110'
        ]
    ],
    'posti' => [
        'Post - Express' => 'Post - Express',
    ],
    'routes' => [
        'kontakt' => [
            'mk' => '/kontakt',
        ],
        'za-nas' => [
            'mk' => '/za-nas'
        ],
        'faq' => [
            'mk' => '/faq'
        ],
        'pravila-na-kupuvanje' => [
            'mk' => '/pravila-na-kupuvanje'
        ],
        'politika-na-privatnost' => [
            'mk' => '/politika-na-privatnost'
        ],
        'faq' => [
            'mk' => '/faq'
        ]
    ],


    'order' => [
        'export_excel' => true,
        'excel_columns' => [

            'name' => 'Име на примач',
            'address' => 'Адреса на примач',
            'city_id' => 'Место на примач',
            'phone' => 'Телефон на примач',
            'weight' => 'Тежина',
            'totalPrice' => 'Откуп'
        ],
    ],


    'narachka_columns' => ['phone', 'address', 'city', 'paid', 'tracking_code', 'nacin_na_plakanje' , 'doc_articles', 'total', 'naracka_ispratena_na', 'naracka_platena_na', 'posta']

];
