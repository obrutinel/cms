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
            'contact_'
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