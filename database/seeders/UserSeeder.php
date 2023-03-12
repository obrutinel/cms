<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::create([
            'name' => 'Olivier',
            'email' => 'olivier.brutinel@gmail.com',
            'password' => bcrypt('test')
        ]);
    }
}
