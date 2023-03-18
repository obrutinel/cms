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
            'types' => [
                'contact' => [
                    'label' => 'aaaaaaaa',
                    'help' => 'aaaa',
                ],
            ],
        ],

        'has_content' => [
            'types' => [
            ],
        ],

        'has_slug' => [
            'types' => [
                'label' => 'aaaaaaaa',
                'help' => 'aaaa',
            ],
        ],

    ],

    'options_disabled' => [
        'types' => [
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
            ],
            'slug' => [
                'home'
            ],
            'meta' => [
                'slide'
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Frontend Views Path
    |--------------------------------------------------------------------------
    */

    'frontend_views_path' => 'frontend/pages/',

];