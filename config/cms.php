<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configurations
    |--------------------------------------------------------------------------
    */

    'options' => [

        'has_list' => [
            'type' => [
                'list-news' => [
                    'name' => 'news',
                    'title_parent_table' => 'Actualité',
                    'title_page' => 'Actualité',
                    'btn_add_page' => 'Ajouter une actualité',
                ],
            ],
        ],

        'has_title' => [
            'contact' => [
                'label' => 'contact',
                'help' => 'Lorem ipsum',
            ],
        ],

    ],

    'options_disabled' => [

        'title' => [
            ''
        ],
        'image' => [
            ''
        ],
        'is_publish' => [
            'home'
        ],
        'content' => [
            'slide',
            'contact'
        ],
        'slug' => [
            'home'
        ],
        'meta' => [
            'slide'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Frontend Views Path
    |--------------------------------------------------------------------------
    */

    'frontend_views_path' => 'frontend/pages/',

];