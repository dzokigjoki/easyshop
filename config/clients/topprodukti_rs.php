<?php

return [
    'sifra'  => true,
    'kupon'  => false,
    'promocija'  => false,
    'locale' => 'rs',
    'title_page' => 'Top Store',
    'logo' => '/assets/topprodukti/image/logo-tp.png',
    'faktura_ispratnica_documents' => false,
    'emailDomain' => 'topprodukti.mk',
    'brandRemoval' => false,
    'google_analytics' => 'UA-97088285-3',
    'pixel' => [
        'codes' => ['320701838398143', '157324774974775'],
        'currency' => 'RSD',
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
        'Post Express'=>'Post Express',
        'IN Posta'=>'IN Posta',
        'Brza pratka' => 'Brza pratka',
        'EAST express' => 'EAST express',
        'Complexpress' => 'Complexpress',
        'Kurier Polska' => 'Kurier Polska',
        'Rapido Ekspres' => 'Rapido Ekspres',
        'BXS Express' => 'BXS Express',
        'IN TIME KURÝR' => 'IN TIME KURÝR'
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
    'currency' => 'Din',
    'currency_select' => ['МКД', 'HRK', 'EUR'],
    'currency_select_front'=> [ // List of currencies and number to divide the denars with
        'Din' => 1,
    ],
    'product' => [
        'showVariations' => true,
        'showManufacturer' => false,
        'shopImporter' => false,
        'show_google_product_category_field' => true,
        'showZemjaNaPoteklo' => false,
        'defaultRecommeded' => false,
    ],
    'cash_drawers' => [
    ],
    'order' => [
        'warehouse_id' => 2, // Defailt warehouse when making orders from web
        'faktura_online'=>0,
        'rezervacija_online'=>0,
        'direct_buy' => true, // TODO: za sto se koristi?
        'allow_minus_quantity' => true,
        'limit_products' => 3,
        'type_delivery' => [
            'cargo' => [
                'name' => 'Kargo',
                'price' => 120
            ]
        ],
        'payment_methods' => [
            // 'фактура'=>'faktura',
            // 'картичка'=>'karticka',
            'Gotovo'=>'gotovo'
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
            'Македонија' => [
                'document_number' => 0,
                'status' => ['name' => 1, 'mapping' => ['Dostavena' => 'Dostavena','Vratena' => 'Vratena']],
                'paid_status' => ['name' => 1, 'mapping' => ['Dostavena' => 'platena']],
                'date_vratena' => 3,
                'date_ispratena' =>2,
                'offset' => 1
            ],
            'Бугарија' => [
                'document_number' => 0,
                'status' => ['name' => 1, 'mapping' => ['Dostavena' => 'Dostavena','Vratena' => 'Vratena']],
                'paid_status' => ['name' => 1, 'mapping' => ['Dostavena' => 'platena']],
                'date_vratena' => 3,
                'date_ispratena' =>2,
                'offset' => 1
            ],
            'Србија' => [
                'document_number' => 0,
                'status' => ['name' => 1, 'mapping' => ['Dostavena' => 'Dostavena','Vratena' => 'Vratena']],
                'paid_status' => ['name' => 1, 'mapping' => ['Dostavena' => 'platena']],
                'date_vratena' => 3,
                'date_ispratena' =>2,
                'offset' => 1
            ],
            'Хрватска' => [
                'document_number' => 0,
                'status' => ['name' => 1, 'mapping' => ['Dostavena' => 'Dostavena','Vratena' => 'Vratena']],
                'paid_status' => ['name' => 1, 'mapping' => ['Dostavena' => 'platena']],
                'date_vratena' => 3,
                'date_ispratena' =>2,
                'offset' => 1
            ],
            'Унгарија' => [
                'document_number' => 0,
                'status' => ['name' => 1, 'mapping' => ['Dostavena' => 'Dostavena','Vratena' => 'Vratena']],
                'paid_status' => ['name' => 1, 'mapping' => ['Dostavena' => 'platena']],
                'date_vratena' => 3,
                'date_ispratena' =>2,
                'offset' => 1
            ],
            'Чешка' => [
                'document_number' => 0,
                'status' => ['name' => 1, 'mapping' => ['Dostavena' => 'Dostavena','Vratena' => 'Vratena']],
                'paid_status' => ['name' => 1, 'mapping' => ['Dostavena' => 'platena']],
                'date_vratena' => 3,
                'date_ispratena' =>2,
                'offset' => 1
            ],
            'Полска' => [
                'document_number' => 0,
                'status' => ['name' => 1, 'mapping' => ['Dostavena' => 'Dostavena','Vratena' => 'Vratena']],
                'paid_status' => ['name' => 1, 'mapping' => ['Dostavena' => 'platena']],
                'date_vratena' => 3,
                'date_ispratena' =>2,
                'offset' => 1
            ],
            'Словачка' => [
                'document_number' => 0,
                'status' => ['name' => 1, 'mapping' => ['Dostavena' => 'Dostavena','Vratena' => 'Vratena']],
                'paid_status' => ['name' => 1, 'mapping' => ['Dostavena' => 'platena']],
                'date_vratena' => 3,
                'date_ispratena' =>2,
                'offset' => 1
            ],
            'Словенија' => [
                'document_number' => 0,
                'status' => ['name' => 1, 'mapping' => ['Dostavena' => 'Dostavena','Vratena' => 'Vratena']],
                'paid_status' => ['name' => 1, 'mapping' => ['Dostavena' => 'platena']],
                'date_vratena' => 3,
                'date_ispratena' =>2,
                'offset' => 1
            ],
            'Романија' => [
                'document_number' => 0,
                'status' => ['name' => 1, 'mapping' => ['Dostavena' => 'Dostavena','Vratena' => 'Vratena']],
                'paid_status' => ['name' => 1, 'mapping' => ['Dostavena' => 'platena']],
                'date_vratena' => 3,
                'date_ispratena' =>2,
                'offset' => 1
            ],
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
    'hide_modules' => ['tiketi', 'manufacturer','baneri'],
    'hide_izvestai' => ['prodazba', 'maloprodazba', 'golemoprodazba', 'ostanato'], // 'prodazba', 'maloprodazba', 'golemoprodazba', 'internetprodazba', 'ostanato'
    'imageSizes' => [
        'lg' => [
            'width' => 860,
            'height' => 640
        ],
        'md' => [
            'width' => 430,
            'height' => 320
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
            'width' => 430,
            'height' => 320
        ],
        'sm' => [
            'width' => 100,
            'height' => 100
        ]
    ],
    'datatablesSaveState' => true,
    'enable_watermark' => false,
     
    'payment' => [
        'type' => null,
    ],
    'calculate_eur'=>true,
    'fix_nabavni_ceni' => false
];