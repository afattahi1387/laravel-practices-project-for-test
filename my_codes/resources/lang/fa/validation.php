<?php

return [
    'required' => 'فیلد :attribute الزامی است.',
    'image' => 'فیلد :attribute حتما باید با فرمت تصاویر باشد.',
    
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
        'name' => 'نام',
        'short_description' => 'مقدمه',
        'long_description' => 'بدنه',
        'image' => 'تصویر'
    ],

];
