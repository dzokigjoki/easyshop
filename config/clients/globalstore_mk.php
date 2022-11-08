<?php

return [
    'sifra' => false,
    'kupon' => false,
    'promocija' => false,
    'locale' => 'mk',
    'title_page' => 'Global Market MK',
    'logo' => '/assets/xxx-xxxxx/images/logo-koregirano.jpg',
    'faktura_ispratnica_documents' => false,
    'emailDomain' => 'globalmarket.com',
    'brandRemoval' => false,
    'google_analytics' => 'UA-xxxx-1',
    'pixel' => [
        'codes' => ['xxxxxx'],
        'currency' => 'MKD',
    ],
    'prices' => [
        'retail1' => true,
        'retail2' => false,
        'wholesale1' => false,
        'wholesale2' => false,
        'wholesale3' => false,
        'diners24' => false,
        'nlb24' => false,
    ],
    'posti'=> [
        'Rapido BG'=>'Rapido BG',
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
    'currency' => 'МКД',
    'currency_select' => ['МКД', 'BGN', 'HRK', 'EUR'],
    'currency_select_front' => [ // List of currencies and number to divide the denars with
        'МКД' => 1,
    ],
    'product' => [
        'showVariations' => true,
        'showManufacturer' => true,
        'shopImporter' => true,
        'show_google_product_category_field' => true,
        'showZemjaNaPoteklo' => true,
        'defaultRecommeded' => false,
    ],
    'cash_drawers' => [
    ],
    'order' => [
        'warehouse_id' => 1, // Defailt warehouse when making orders from web
        'faktura_online' => 0,
        'rezervacija_online' => 0,
        'direct_buy' => true,
        'allow_minus_quantity' => true,
        'limit_products' => 10,
        'type_delivery' => [
            'cargo' => [
                'name' => 'Брза достава',
                'price' => '118'
            ]
        ],
        'payment_methods' => [
            'Готово' => 'gotovo'
        ],
        'export_excel' => true,
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
            'Бугарија - Rapido' => [
                'document_number' => 0,
                'status' => ['name' => 1, 'mapping' => ['Dostavena' => 'Dostavena','Vratena' => 'Vratena']],
                'paid_status' => ['name' => 2, 'mapping' => ['Platena' => 'platena']],
                'date_vratena' => 3,
                'date_ispratena' => 4,
                'offset' => 1
            ],
        ],
    ],
    'hide_modules' => ['tiketi','baneri'],
    'hide_izvestai' => ['prodazba', 'maloprodazba', 'golemoprodazba', 'ostanato'], // 'prodazba', 'maloprodazba', 'golemoprodazba', 'internetprodazba', 'ostanato'
    'imageSizes' => [
        'lg' => [
            'width' => 575,
            'height' => 575
        ],
        'md' => [
            'width' => 244,
            'height' => 244
        ],
        'sm' => [
            'width' => 72,
            'height' => 72
        ]
    ],
    'blogImageSizes' => [
        'lg' => [
            'width' => 575,
            'height' => 575
        ],
        'md' => [
            'width' => 244,
            'height' => 244
        ],
        'sm' => [
            'width' => 72,
            'height' => 72
        ]
    ],
    'datatablesSaveState' => true,
    'enable_watermark' => true,
     
    'payment' => [
        'type' => null,
    ],
    'sync' => [
        'bulgaria' => [
            'user' => 'globalmarket',
            'password' => '25CA26A7',
        ]
    ],
    'calculate_eur'=>false,
    'fix_nabavni_ceni' => false,
    'narachka_columns' => ['phone','address','city','paid','tracking_code', 'nacin_na_plakanje' ,'doc_articles','total','naracka_ispratena_na','naracka_platena_na','posta']

];