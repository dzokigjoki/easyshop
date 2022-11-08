<?php

return [
    'sifra'  => true,
    'kupon'  => false,
    'promocija'  => true,
    'locale' => 'mk',
    'title_page' => 'Технополис',
    'logo' => '/assets/tehnopolis/images/logo.png',
    'logo_documents' => 'assets/tehnopolis/images/logo.png',
    'faktura_ispratnica_documents' => true,
    'emailDomain' => 'tehnopolis.mk',
    'brandRemoval' => false,
    'google_analytics' => 'UA-99709700-1',
    'pixel' => [
        'codes' =>  ['878046105678885'],
        'currency' => 'MKD',
    ],
    'posti'=> [
        'Брза Пратка' => 'Брза Пратка',
    ],

    'languages' => [

        'lang1' => [

            'active' => true,

            'locale' => 'mk',

            'url_segment' => '',

            'name' => 'Македонски'

        ],
    ],
    'prices' => [
        'retail1' => true,
        'retail2' => true,
        'wholesale1' => true,
        'wholesale2' => true,
        'wholesale3' => true,
        'diners24' => true,
        'nlb24' => true,
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
        'ostanato' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa'],
        'faktura_online' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa']
    ],
    'currency' => 'МКД',
    'currency_select' => ['МКД'],
    'currency_select_front'=> [ // List of currencies and number to divide the denars with
        'МКД' => 1,
        'EUR' => 61
    ],
    'service_status' => [
        'ПРИМЕН' => [
            'color' => 'bg-blue-hoki',
            'name' => 'ПРИМЕН',
        ],
        'ЗАВРШЕН' => [
            'color' => 'bg-green-soft',
            'name' => 'ЗАВРШЕН',
        ],
        'НЕ МОЖЕ' => [
            'color' => 'bg-red-soft',
            'name' => 'НЕ МОЖЕ',
        ],
        'НЕ САКА' => [
            'color' => 'bg-yellow-soft',
            'name' => 'НЕ САКА',
        ],
        'ПРАТЕН ДМ' => [
            'color' => 'bg-blue-hoki',
            'name' => 'ПРАТЕН ДМ',
        ],
        'ПРАТЕН АЕ' => [
            'color' => 'bg-blue-hoki',
            'name' => 'ПРАТЕН АЕ',
        ],
        'ПРИМЕН РЕК' => [
            'color' => 'bg-blue-hoki',
            'name' => 'ПРИМЕН РЕК',
        ],
        'ЗАВРШЕН РЕК' => [
            'color' => 'bg-blue-hoki',
            'name' => 'ЗАВРШЕН РЕК',
        ],
        'НЕ МОЖЕ РЕК' => [
            'color' => 'bg-blue-hoki',
            'name' => 'НЕ МОЖЕ РЕК',
        ],
    ],
    'product' => [
        'showVariations' => false,
        'showManufacturer' => true,
        'show_google_product_category_field' => false,
        'shopImporter' => true,
        'showZemjaNaPoteklo' => true,
        'defaultRecommeded' => false,
    ],
    'cash_drawers' => [
        'gjorce1' => [
            'id' => 1,
            'name' => 'Ѓорче 1',
            'warehouse_id' => 1
        ],
        'aerodrom1' => [
            'id' => 2,
            'name' => 'Аеродром 1',
            'warehouse_id' => 2
        ],
    ],
    'shops' => [
        'gjorce' => [
            'id' => 1,
            'name' => 'Ѓорче 1',
        ]
    ],
    'order' => [
        'warehouse_id' => 6, // Defailt warehouse when making orders from web
        'faktura_online'=>1,
        'rezervacija_online'=>0,
        'direct_buy' => true,
        'allow_minus_quantity' => false,
        'limit_products' => 0,
        'type_delivery' => [
            'cargo' => [
                'name' => 'Карго',
                'price' => 140
            ]
        ],
        'payment_methods' => [
            'фактура'=>'faktura',
            'картичка'=>'karticka',
            'готово'=>'gotovo'
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
            'zip_other' => 'Zip',
            'city_id' => 'City',
            'country_id' => 'country',
            'products' => 'Products',
            'currency' => 'Currency',
            'quantity' => 'Quantity',
            'totalPrice' => 'Vkupna cena'
        ],
        'import_excel' => true,
        'import_columns' => [
            'Брза Пратка' => [
                'document_number' => 12,
                'tracking_code' => 2,
                'status' => ['name' => 25, 'mapping' => ['Исплаќање на откуп' => 'Dostavena','Доставена'  => 'Dostavena', 'Добавен в РКО' => 'Dostavena','Вратена на испраќач'  => 'Returned']],
                'paid_status' => ['name' => 25, 'mapping' => ['Исплаќање на откуп' => 'platena','Доставена'  => 'platena', 'Добавен в РКО' => 'neplatena','Вратена на испраќач'  => 'neplatena']],
                'offset' => 1
            ]
        ],
    ],
    'hide_modules' => ['tiketi'],
    'hide_izvestai' => [], // 'prodazba', 'maloprodazba', 'golemoprodazba', 'internetprodazba', 'ostanato'
    'imageSizes' => [
        'lg' => [
            'width' => 800,
            'height' => 800
        ],
        'md' => [
            'width' => 244,
            'height' => 244
        ],
        'sm' => [
            'width' => 100,
            'height' => 100
        ]
    ],
    'bannerMaxWidth' => [
        'lg' => [
            'width' => 1140,
            'height' => 340
        ],
        'md' => [
            'width' => 555,
            'height' => 370
        ],
    ],
    'blogImageSizes' => [
        'lg' => [
            'width' => 800,
            'height' => 800
        ],
        'md' => [
            'width' => 244,
            'height' => 244
        ],
        'sm' => [
            'width' => 100,
            'height' => 100
        ]
    ],
    'datatablesSaveState' => false,
    'enable_watermark' => true,
     
    'payment' => [
        'type' => 'casys',
        'merchantId' => '1000001019',
        'merchantName' => 'TEHNOPOLIS DOO',
    ],
    'calculate_eur'=>false,
    'MERCHANT_MD5_PASSWORD'=> 'z2/w>Wv~a4za}nD2c%6t@QNmf.rn;n+[',
    'najdi_razliki_menu' => true,
    'rekalkuliraj_kolicini_menu'=>true,
    'fix_nabavni_ceni' => true,
    'narachka_columns' => ['phone','address','city','paid', 'nacin_na_plakanje' ,'tracking_code','doc_articles','total','naracka_ispratena_na','naracka_platena_na','posta']
];