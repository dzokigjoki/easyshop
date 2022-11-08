<?php

return [

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
    'order' => [
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
            'currency' => 'Currency',
            'quantity' => 'Quantity',
            'totalPrice' => 'Vkupna cena'
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

    'narachka_columns' => ['phone','address','city','paid','tracking_code','doc_articles', 'nacin_na_plakanje' ,'total','naracka_ispratena_na','naracka_platena_na','posta']

];