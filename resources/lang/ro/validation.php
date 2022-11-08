<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Полето :attribute мора да биде штиклирано.',
    'active_url'           => 'Полето :attribute не е валидно УРЛ.',
    'after'                => 'Полето :attribute мора да биде датум по :date.',
    'alpha'                => 'Полето :attribute може да содржи само букви.',
    'alpha_dash'           => 'Полето :attribute може да содржи букви, бројки и црти.',
    'alpha_num'            => 'Полето :attribute може да содржи само букви и бројки.',
    'array'                => 'Полето :attribute мора да биде низа.',
    'before'               => 'Полето :attribute мора да биде датум пред :date.',
    'between'              => [
        'numeric' => 'Полето :attribute мора да биде меѓу :min и :max.',
        'file'    => 'Полето :attribute мора да биде меѓу :min и :max килобајти.',
        'string'  => 'Полето :attribute мора да биде меѓу :min и :max карактери.',
        'array'   => 'Полето :attribute мора да биде меѓу :min и :max артикли.',
    ],
    'boolean'              => 'Полето :attribute мора да биде вистина или лага.',
    'confirmed'            => 'Мора да се сложите со полето :attribute .',
    'date'                 => 'Полето :attribute не е валиден датум.',
    'date_format'          => 'Полето :attribute не се совпаѓа со форматот :format.',
    'different'            => 'Полињата :attribute и :other мора да се различни.',
    'digits'               => 'Полето :attribute мора да е со :digits цифри.',
    'digits_between'       => 'Полето :attribute мора да е меѓу :min и :max цифри.',
    'email'                => 'Полето :attribute мора да е валидна е-мејл адреса.',
    'filled'               => 'Полето :attribute е задолжително.',
    'exists'               => 'Селектираното поле :attribute не е валидно.',
    'image'                => 'Полето :attribute мора да е слика.',
    'in'                   => 'Селектираните вредности од полето :attribute се невалидни.',
    'integer'              => 'Полето :attribute мора да е број.',
    'ip'                   => 'Полето :attribute мора да е валидна IP адреса.',
    'max'                  => [
        'numeric' => 'Полето :attribute не смее да е поголемо од :max.',
        'file'    => 'Полето :attribute не смее да е поголемо од :max килобајти.',
        'string'  => 'Полето :attribute не смее да е поголемо од :max карактери.',
        'array'   => 'Полето :attribute не смее да е поголемо од :max артикли.',
    ],
    'mimes'                => 'Полето :attribute мора да е фајл од типот: :values.',
    'min'                  => [
        'numeric' => 'Полето :attribute мора да е најмалку :min.',
        'file'    => 'Полето :attribute мора да е најмалку :min килобајти.',
        'string'  => 'Полето :attribute мора да е најмалку :min карактери.',
        'array'   => 'Полето :attribute мора да е најмалку :min артикли.',
    ],
    'not_in'               => 'Селектираната вредност на полето :attribute не е валидна.',
    'numeric'              => 'Полето :attribute мора да е број.',
    'regex'                => 'Форматот на полето :attribute не е валиден.',
    'required'             => 'Полето :attribute е задолжително.',
    'required_if'          => 'Полето :attribute е задолжително кога :other има вредност :value.',
    'required_with'        => 'Полето :attribute е задолжително кога полето :values е присутно.',
    'required_with_all'    => 'Полето :attribute е задолжително кога полињата :values се присутни.',
    'required_without'     => 'Полето :attribute е задолжително кога полето :values не е присутно.',
    'required_without_all' => 'Полето :attribute е задолжително кога ниедно поле од :values не е присутно.',
    'same'                 => 'Полињата :attribute и :other мора да се совпаѓаат.',
    'size'                 => [
        'numeric' => 'Полето :attribute мора да биде со големина :size.',
        'file'    => 'Полето :attribute мора да биде од :size килобајти.',
        'string'  => 'Полето :attribute мора да содржи :size карактери.',
        'array'   => 'Полето :attribute мора да содржи :size артикли.',
    ],
    'string'               => 'Полето :attribute мора да е збор.',
    'timezone'             => 'Полето :attribute мора да е валидна временска зона.',
    'unique'               => 'Полето :attribute е веќе зафатено.',
    'url'                  => 'Форматот на полето :attribute е невалиден.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'videosubmit' => 'Дозволено е да постирате само едно видео дневно.',
    'videounique' => 'Видеото е веќе претходно постирано.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'email'         => 'Е-мејл'
    ],

];
