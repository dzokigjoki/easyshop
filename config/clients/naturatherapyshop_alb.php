<?php
return [
    'routes' => [
        'za-nas' => [
            'al' => '/about-us'
        ],
        'faq' => [
            'al' => '/faq'
        ],
        'kontakt' => [
            'al' => '/contact'
        ],
        'meni' => [
            'al' => 'meni'
        ],
        'our_shop' => [
            'al' => '/our-shops'
        ],
        'politika-e-privatesise' =>[
            'al' => '/politika-e-privatesise'
        ]
    ],
    
    'type_delivery' => [
        'cargo' => [
            'name' => 'Карго',
            'price' => 250
        ]
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
            'totalPrice' => 'Vkupna cena'
        ]
    ],
    'languages' => [

        'lang1' => [

            'active' => true,

            'locale' => 'al',

            'url_segment' => '',

            'name' => 'Albanian'
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
    'top-sliderBannerMaxWidth' => [
        'lg' => [
            'width' => 1440,
            'height' => 400
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
            'width' => 800,
            'height' => 800
        ],
    ],
    'categoryBannerMaxWidth' => [
        'lg' => [
            'width' => 944,
            'height' => 500
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
            'width' => 450,
            'height' => 450
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
    'type_of_order' =>[
        'active' => true,
        'fields' => ['Социјални мрежи', 'Inbound', 'Outbound', 'Web', 'Продавници']
    ],
    'narachka_columns' => ['phone','note','paid', 'tracking_code', 'type_of_order','doc_articles', 'total', 'naracka_ispratena_na', 'naracka_platena_na', 'posta', 'note'],
    'contact_email' => 'contact@naturaks.com'
];
