<?php
return [

'routes' => [
        'za-nas' => [
            'mk' => '/za-nas'
        ],
        'faq' => [
            'mk' => '/faq'
        ],
        'kontakt' => [
            'mk' => '/kontakt'
        ],
        'meni' => [
            'mk' => 'meni'
        ],
        'our_shop' => [
            'mk' => '/nasite-prodavnici'
        ],
        'politika-na-kolacinja' => [
            'mk' => '/politika-na-kolacinja'
        ]
    ],
    'service_status' => [
        'Примен на сервис' => [
            'color' => 'bg-blue-hoki',
            'name' => 'Примен на сервис',
        ],
        'Завршен' => [
            'color' => 'bg-green-soft',
            'name' => 'Завршен',
        ],
        'Не може да се поправи' => [
            'color' => 'bg-red-soft',
            'name' => 'Не може да се поправи',
        ],
        'Одбиен' => [
            'color' => 'bg-yellow-soft',
            'name' => 'Одбиен',
        ]
    ],

    'type_delivery' => [
        'cargo' => [
            'name' => 'Карго',
            'price' => 100
        ],
        'aerodrom' => [
            'name' => 'Продажен салон Аеродром',
            'price' => 0
        ],
        'cair' => [
            'name' => 'Продажен салон Чаир',
            'price' => 0
        ],
        'centar' => [
            'name' => 'Продажен салон Центар',
            'price' => 0
        ]
    ],
    'big-sliderBannerMaxWidth' => [
        'lg' => [
            'width' => 1920,
            'height' => 900 
        ],
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
    'sliderBannerMaxWidth' => [
        'lg' => [
            'width' => 1500,
            'height' => 1500 
        ],
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
    'promotionsBannerMaxWidth' => [
        'lg' => [
            'width' => 1600,
            'height' => 1600 
        ],
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
    'order' => [
        'export_excel' => true,
        'excel_columns' => [
            'no' => 'No.',
            'document_number' => 'Broj na narachka',
            'document_date' => 'Datum',
            'naracka_ispratena_na' => 'Datum ispratena',
            'created_by' => 'Operator',
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
            'totalPrice' => 'Vkupna cena',
            'comment' => 'Komentar'
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
    'languages' => [

        'lang1' => [

            'active' => true,

            'locale' => 'mk',

            'url_segment' => '',

            'name' => 'Македонски'

        ],
    ],
    'type_of_order' =>[
        'active' => true,
        'fields' => ['Социјални мрежи', 'Inbound', 'Outbound', 'Web', 'Продавници']
    ],
    'narachka_columns' => ['phone','note','paid', 'tracking_code', 'type_of_order','doc_articles', 'total', 'naracka_ispratena_na', 'naracka_platena_na', 'posta', 'note'],
];
