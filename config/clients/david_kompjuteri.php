<?php

return [
    'posti' => [
        'Post - Express' => 'Post - Express',
    ],

    'type_delivery' => [
            'cargo' => [
                'name' => 'Брза достава',
                'price' => '110'
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
        'contact' => [
            'mk' => '/contact',
        ],
        'kviz' => [
            'mk' => '/kviz',
        ],
        'faq' => [
            'mk' => '/faq',
        ],
        'about-us' => [
            'mk' => '/about-us',
        ],
        'vrabotuvanje' => [
            'mk' => '/vrabotuvanje',
        ],
        'softver' => [
            'mk' => 'c/{id}/softver',
        ],
        'benziski-pumpi' => [
            'mk' => 'c/{id}/benzinski-pumpi',
        ],
        'materijalno-rabotenje' => [
            'mk' => 'c/{id}/materijalno-rabotenje',
        ],
        'restoransko-rabotenje' => [
            'mk' => 'c/{id}/restoransko-rabotenje',
        ],
        'rabota-so-fiskalni-aparati' => [
            'mk' => 'c/{id}/rabota-so-fiskalni-aparati',
        ],
        'finansisko-knigovodstvo' => [
            'mk' => 'c/{id}/finansisko-knigovodstvo',
        ],
        'presmetka-na-plati' => [
            'mk' => 'c/{id}/presmetka-na-plati',
        ],
        'fiskalni-aparati' => [
            'mk' => '/c/{id}/fiskalni-aparati',
        ]
    ],
    'cash_drawers' => [],
    'order' => [
        'excel_columns' => [
            'no' => 'No.',
            'document_number' => 'Broj na narachka',
            'document_date' => 'Datum',
            'naracka_ispratena_na' => 'Datum ispratena',
            'first_name' => 'Ime Prezime',
            'address' => 'Adresa',
            'phone' => 'Tel',
            'email' => 'Email',
            'zip_other_shipping' => 'Zip',
            'city_id' => 'City',
            'country_id' => 'country',
            'products' => 'Products',
            'currency' => 'Currency',
            'quantity' => 'Quantity',
            'totalPrice' => 'Vkupna cena'
        ],
        'import_excel' => true,
        'import_columns' => [
            'Македонија - Post Express' => [
                'document_number' => 12,
                'tracking_code' => 1,
                'status' => ['name' => 3, 'mapping' => ['Dostavena' => 'Dostavena']],
                'paid_status' => ['name' => 3, 'mapping' => ['Dostavena' => 'platena']],
                'offset' => 4
            ],
            'Македонија - Brza pratka' => [
                'document_number' => 12,
                'tracking_code' => 1,
                'status' => ['name' => 3, 'mapping' => ['Dostavena' => 'Dostavena']],
                'paid_status' => ['name' => 3, 'mapping' => ['Dostavena' => 'platena']],
                'offset' => 4
            ],
            'Македонија - IN Posta' => [
                'document_number' => 12,
                'tracking_code' => 1,
                'status' => ['name' => 3, 'mapping' => ['Dostavena' => 'Dostavena']],
                'paid_status' => ['name' => 3, 'mapping' => ['Dostavena' => 'platena']],
                'offset' => 4
            ]
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
];
