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
            'width' => 550,
            'height' => 550
        ],
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
    'narachka_columns' => ['phone','address','note','city','paid', 'nacin_na_plakanje' ,'tracking_code','doc_articles','total','naracka_ispratena_na','naracka_platena_na','posta', 'note']

];