<?php

return [
    
    'routes' => [
        'za-nas' => [
            'mk' => '/za-nas'
        ],
        'faq' => [
            'mk' => '/faq'
        ],
        'contact' => [
            'mk' => '/kontakt'
        ],
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
    'document_status' => [
        'priemnica' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa'],
        'ispratnica' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa'],
        'narachka' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa', 'ispratena' => 'Испратена', 'dostavena' => 'Доставена','vratena' => 'Вратена','reklamacija'=>'Рекламација','stornirana'=>'Сторнирана'],
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
            'price' => 150
        ]
    ],
    
    'order' => [
        'export_excel' => true,
        'excel_columns' => [
            'no' => 'No.',
            'document_number' => 'Broj na narachka',
            'document_date' => 'Datum',
            'first_name' => 'Ime Prezime',
            'note' => 'Komentar',
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
        'import_excel' => false,
        'import_columns' => [
        ],
    ],
    'hide_modules'=>['tiketi','servis'],
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
    'hide_izvestai' => ['prodazba', 'maloprodazba', 'golemoprodazba', 'ostanato'], // 'prodazba', 'maloprodazba', 'golemoprodazba', 'internetprodazba', 'ostanato'
    'imageSizes' => [
        'lg' => [
            'width' => 1000,
            'height' => 1000
        ],
        'md' => [
            'width' => 600,
            'height' => 600
        ],
        'sm' => [
            'width' => 300,
            'height' => 300
        ]
    ],
    'blogImageSizes' => [
        'lg' => [
            'width' => 900,
            'height' => 450
        ],
        'md' => [
            'width' => 800,
            'height' => 400
        ],
        'sm' => [
            'width' => 400,
            'height' => 200
        ]
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

    
    'narachka_columns' => ['phone','address','note','city','paid','tracking_code','doc_articles','total', 'nacin_na_plakanje' ,'naracka_ispratena_na','naracka_platena_na','posta', 'note'],
];