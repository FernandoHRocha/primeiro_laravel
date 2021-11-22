<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Post::truncate();
        Category::truncate();

        $development = Category::create([
            'name' => 'Desenvolvimento',
            'slug' => 'desenvolvimento'
        ]);

        $personal = Category::create([
            'name' => 'Pessoal',
            'slug' => 'pessoal'
        ]);

        $economy = Category::create([
            'name' => 'Finanças',
            'slug' => 'financas'
        ]);

        $entertainment = Category::create([
            'name' => 'Entretenimento',
            'slug' => 'entretenimento'
        ]);

        $user = User::create([
            'name' => 'Fernando H. Rocha',
            'slug' => 'fernando_rocha',
            'email' => 'fhrlobacz@gmail.com',
            'password' => bcrypt('123'),
            'is_admin' => true
        ]);

        $user = User::create([
            'name' => 'Jessica C. F. Gomes',
            'slug' => 'jessica_gomes',
            'email' => 'jessica.cfg@hotmail.com',
            'password' => bcrypt('123'),
            'is_admin' => true
        ]);

        Post::factory(30)->create();
    }
}
