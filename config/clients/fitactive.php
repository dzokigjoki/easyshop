<?php

return [
    'sifra' => true,
    'kupon' => false,
    'promocija' => false,
    'locale' => 'mk',
    'title_page' => 'fitactive.mk',
    'logo' => '/easyshop/fitactive/images/logo.png',
    'faktura_ispratnica_documents' => false,
    'emailDomain' => 'fitactive.mk',
    'contact_email' => 'info@fitactive.mk',
    'brandRemoval' => false, // moze da se brise
    'google_analytics' => "UA-191598116-2",
    'nalepnica' => true,
    'telephone' => '071683682',
    'pixel' => [
        'codes' => null,
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
    'posti' => [
        'Post - Express' => 'Post - Express',
    ],
    
    'routes' => [
        'za-nas' => [
            'mk' => '/za-nas'
        ],
        'kontakt' => [
            'mk' => '/kontakt',
        ],
        'politika-na-privatnost' => [
            'mk' => '/politika-na-privatnost'
        ],
        'politika-na-kolacinja' => [
            'mk' => '/politika-na-kolacinja'
        ]
    ],      
    'document_status' => [ // da se izbrise da ne bide dinamicki odnosno da bide od modelot
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
    'currency' => 'МКД',
    'currency_select' => ['МКД', 'EUR', 'USD'],
    'currency_select_front' => [ // List of currencies and number to divide the denars with
        'МКД' => 1,
    ],
    'product' => [
        'showVariations' => true,
        'showManufacturer' => true,
        'show_google_product_category_field' => false,
        'shopImporter' => true,
        'showZemjaNaPoteklo' => true,
        'defaultRecommeded' => false,
    ],
    'cash_drawers' => [], // moze da se izbrise ova
    'order' => [
        'warehouse_id' => 1, // Defailt warehouse when making orders from web
        'faktura_online' => 0,
        'rezervacija_online' => 0,
        'direct_buy' => true,
        'allow_minus_quantity' => true,
        'limit_products' => null,
        'type_delivery' => [
            'cargo' => [
                'name' => 'Брза достава',
                'price' => '110'
            ]
        ],
        'payment_methods' => [
            'Кредитна/Дебитна картичка' => 'casys',
            'Во готово' => 'gotovo'
        ],
        'export_excel' => true, // moze da se izbrise ova
        'excel_columns' => [

            'name' => 'Име на примач',
            'address' => 'Адреса на примач',
            'city_id' => 'Место на примач',
            'phone' => 'Телефон на примач',
            'weight' => 'Тежина',
            'totalPrice' => 'Откуп',
            'products' => 'Клиентски број',
            'comment' => 'Коментар'
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
    'hide_modules' => ['tiketi'],
    'hide_izvestai' => ['prodazba', 'maloprodazba', 'golemoprodazba', 'ostanato'], // 'prodazba', 'maloprodazba', 'golemoprodazba', 'internetprodazba', 'ostanato'

    'sliderBannerMaxWidth' => [
        'lg' => [
            'width' => 1900,
            'height' => 752
        ],
        'md' => [
            'width' => 800,
            'height' => 800,
        ],
        'sm' => [
            'width' => 800,
            'height' => 252,
        ],
        'mob' => [
            'width' => 800,
            'height' => 800
        ],
    ],
    'homecategoriesBannerMaxWidth' => [
        'lg' => [
            'width' => 420,
            'height' => 280
        ],
        'md' => [
            'width' => 420,
            'height' => 280,
        ],
        'sm' => [
            'width' => 420,
            'height' => 280,
        ],
        'mob' => [
            'width' => 420,
            'height' => 280
        ],
    ],
    'imageSizes' => [
        'lg' => [
            'width' => 600,
            'height' => 766
        ],
        'md' => [
            'width' => 415,
            'height' => 530
        ],
        'sm' => [
            'width' => 100,
            'height' => 100
        ]
    ],
    'blogImageSizes' => [
        'lg' => [
            'width' => 860,
            'height' => 640
        ],
        'md' => [
            'width' => 225,
            'height' => 326
        ],
        'sm' => [
            'width' => 100,
            'height' => 100
        ]
    ],
    'datatablesSaveState' => true, // moze da se brise
    'enable_watermark' => false,
      // moze da se brise
    'payment' => [
        'type' => 'casys',
        'merchantId' => '1000001567',
        'merchantName' => 'MAJ MODA DOOEL',
    ],
    'calculate_eur' => false, // moze da se brise
    'MERCHANT_MD5_PASSWORD' => 'LQz9xvhcAg3Be2bjBDyGPArxqCfPRRUf',
    'fix_nabavni_ceni' => false,
    'narachka_columns' => ['phone', 'address', 'city', 'paid', 'tracking_code', 'nacin_na_plakanje', 'doc_articles', 'total', 'naracka_ispratena_na', 'naracka_platena_na', 'posta']

];
