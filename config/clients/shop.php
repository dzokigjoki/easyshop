<?php

return [
    'sifra'  => true,
    'kupon'  => false,
    'promocija'  => false,
    'locale' => 'mk',
    'title_page' => 'Alex Filippe',
    'logo' => '/assets/alex_filippe/images/logo.svg',
    'faktura_ispratnica_documents' => false,
    'emailDomain' => 'alexfilippe.mk',
    'brandRemoval' => false,
    'google_analytics' => '',
    'pixel' => [
        'codes' => [''],
        'currency' => 'MKD',
    ],
    'posti'=> [
        ''
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
    'currency' => 'МКД',
    'currency_select'=>['МКД','HRK','EUR'],
    'currency_select_front'=> [ // List of currencies and number to divide the denars with
        'МКД' => 1,
        'EUR' => 61
    ],
    'product' => [
        'showVariations' => true,
        'showManufacturer' => true,
        'show_google_product_category_field' => false,
        'shopImporter' => false,
        'showZemjaNaPoteklo' => false,
        'defaultRecommeded' => false,
    ],
    'cash_drawers' => [
    ],
    'order' => [
        'warehouse_id' => 1, // Defailt warehouse when making orders from web
        'faktura_online'=>0,
        'rezervacija_online'=>0,
        'direct_buy' => true,
        'allow_minus_quantity' => false,
        'limit_products' => 0,
        'type_delivery' => [
            'novaPosta' => [
                'name' => 'Карго',
                'price' => 0,
            ]
        ],
        'payment_methods' => [
            'Во готово' => 'gotovo',
        ],
        'export_excel' => true,
        'excel_columns' => [
            'no' => 'No.',
            'document_number' => 'Broj na narachka',
            'document_date' => 'Datum',
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
        'import_excel' => false,
        'import_columns' => [
        ],
    ],
    'bannerMaxWidth' => [
        'lg' => [
            'width' => 1920,
            'height' => 500
        ],
        'md' => [
            'width' => 555,
            'height' => 370
        ],
    ],
    //'popusti','tiketi','servis','blog'
    'hide_modules'=>['tiketi','servis'],
    'hide_izvestai' => ['prodazba', 'maloprodazba', 'golemoprodazba', 'ostanato'], // 'prodazba', 'maloprodazba', 'golemoprodazba', 'internetprodazba', 'ostanato'
    'imageSizes' => [
        'lg' => [
            'width' => 1000,
            'height' => 669
        ],
        'md' => [
            'width' => 500,
            'height' => 335
        ],
        'sm' => [
            'width' => 150,
            'height' => 100
        ]
    ],
    'blogImageSizes' => [
        'lg' => [
            'width' => 600,
            'height' => 900
        ],
        'md' => [
            'width' => 300,
            'height' => 450
        ],
        'sm' => [
            'width' => 90,
            'height' => 135
        ]
    ],
    'enable_watermark' => false,
     
    'imageBlogSizes' => [

    ],
    'datatablesSaveState' => false,
    'payment' => [
        // 'type' => 'casys',
        // 'merchantId' => '',
        // 'merchantName' => '',    
    ],
    'calculate_eur'=>false,
    'MERCHANT_MD5_PASSWORD'=> null,
    'fix_nabavni_ceni' => false,
    'narachka_columns' => ['phone','address','city','paid', 'nacin_na_plakanje' ,'tracking_code','doc_articles','total','naracka_ispratena_na','naracka_platena_na','posta']

];