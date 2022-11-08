<?php

return [
    'sifra' => false,
    'kupon' => false,
    'promocija' => false,
    'locale' => 'mk',
    'title_page' => 'Unlimited Shopping',
    'logo' => '/assets/admin/easyshop/unlimited_shopping/logo.png',
    'faktura_ispratnica_documents' => false,
    'emailDomain' => 'unlimitedshopping.mk',
    'brandRemoval' => false,
    'google_analytics' => 'UA-xxxx-1',
    
    'prices' => [
        'retail1' => true,
        'retail2' => false,
        'wholesale1' => false,
        'wholesale2' => false,
        'wholesale3' => false,
        'diners24' => false,
        'nlb24' => false,
    ],
    'posti' => [
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
    'currency_select' => ['МКД'],
    'product' => [
        'showVariations' => false,
        'showManufacturer' => false,
        'shopImporter' => true,
        'show_google_product_category_field' => true,
        'showZemjaNaPoteklo' => true,
        'defaultRecommeded' => false,
    ],
    'cash_drawers' => [],
    'order' => [
        'warehouse_id' => 1, // Defailt warehouse when making orders from web
        'faktura_online' => 0,
        'rezervacija_online' => 0,
        'direct_buy' => false,
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
        'export_excel' => true
    ],
    'hide_modules' => ['tiketi', 'baneri'],
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
    'enable_watermark' => false,
     
    // 'payment' => [
    //     'type' => null,
    // ],

    'calculate_eur' => false,
    'fix_nabavni_ceni' => false,
    'narachka_columns' => ['phone', 'address', 'city', 'paid', 'nacin_na_plakanje', 'tracking_code', 'doc_articles', 'total', 'naracka_ispratena_na', 'naracka_platena_na', 'posta']

];
