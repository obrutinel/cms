<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Page::insert([
            [
                'title' => 'Accueil',
                'type' => 'home',
                'is_publish' => 1,
                'slug' => null
            ],
            [
                'title' => 'A propos',
                'type' => 'page',
                'is_publish' => 1,
                'slug' => 'a-propos'
            ],
            [
                'title' => 'Contact',
                'type' => 'contact',
                'is_publish' => 1,
                'slug' => 'contact'
            ],
            [
                'title' => 'Mentions légales',
                'type' => 'page',
                'is_publish' => 1,
                'slug' => 'mentions-legales'
            ],
            [
                'title' => 'Politique de confidentialité',
                'type' => 'page',
                'is_publish' => 1,
                'slug' => 'politique-de-confidentialite'
            ],
        ]);

    }
}
