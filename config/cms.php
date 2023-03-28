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
                'office' => [
                    'label' => 'Lieu',
                    //'help' => 'aaaa',
                ],
            ],
        ],

        // Champs image caché par défaut
        'has_image' => [
            'types' => [
                'contact' => [
                    'label' => 'Photo',
                    'help' => 'Taille minimum: 1920x1080',
                    'crop' => true,
                    'width' => 800,
                    'height' => 600,
                ],
            ],
        ],

        'has_excerpt' => [
            'types' => [
                'office' => [
                    'label' => 'Adresse',
                ],
            ],
        ],

        'has_content' => [
            'types' => [
            ],
        ],

        // Champs date caché par défault
        'has_link' => [
            'types' => [
                'office' => [
                    'label_link' => 'Téléphone',
                    'label_url' => 'Email',
                ],
            ],
        ],

        'has_publish' => [
            'types' => [
                'contact' => [
                    'label' => 'Activer',
                ],
            ],
        ],

        'has_slug' => [
            'types' => [
            ],
        ],

        // Champs date caché par défault
        'has_date' => [
            'types' => [
                'contact' => [
                    'label' => 'Date',
                ],
            ],
        ],

    ],

    'options_list' => [
        'types' => [
            'office' => [
                'title' => 'Liste des bureaux',
                //'subtitle' => 'sous titre',
                'btn_add' => 'Ajouter un bureau',
            ]
        ]
    ],

    'has_custom_list' => [
        'types' => ['office']
    ],

    'options_disabled' => [
        'types' => [
            'title' => [
                ''
            ],
            'image' => [
                ''
            ],
            'publish' => [
                'home'
            ],
            'excerpt' => [
                'contact',
            ],
            'content' => [
                'slide',
            ],
            'slug' => [
                'home', 'slide', 'office'
            ],
            'link' => [
            ],
            'date' => [
            ],
            'meta' => [
                'slide', 'office'
            ],
        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | Views Path
    |--------------------------------------------------------------------------
    |
    | Paths where views are created. You can change the default path.
    |
    */

    'back_views_path' => 'admin/pages/',
    'front_views_path' => 'frontend/pages/',

];