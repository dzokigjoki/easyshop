<?php

return [
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
    ],'narachka_columns' => ['phone','address','city','paid','tracking_code','doc_articles', 'nacin_na_plakanje' ,'total','naracka_ispratena_na','naracka_platena_na','posta']

];