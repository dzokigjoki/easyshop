<?php

return [
    
    'service_status' => [
        'Примен на сервис' => [
            'color' => 'bg-blue-hoki',
            'name' => 'Примен на сервис',
        ],
        'Завршен' => [
            'color' => 'bg-green-soft',
            'name' => 'Завршен',
        ],
        'НЕ САКА' => [
            'color' => 'bg-yellow-soft',
            'name' => 'НЕ САКА',
        ],
        'Не може да се поправи' => [
            'color' => 'bg-red-soft',
            'name' => 'Не може да се поправи',
        ],
        'Одбиен' => [
            'color' => 'bg-yellow-soft',
            'name' => 'Одбиен',
        ],
        'ПРИМЕН' => [
            'color' => 'bg-blue-hoki',
            'name' => 'ПРИМЕН',
        ],
        'ЗАВРШЕН' => [
            'color' => 'bg-green-soft',
            'name' => 'ЗАВРШЕН',
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
        'ostanato' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa'],
        'faktura_online' => ['podgotovka' => 'Подготовка', 'generirana' => 'Генериранa']
    ],

    'order' => [
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
    ],

];