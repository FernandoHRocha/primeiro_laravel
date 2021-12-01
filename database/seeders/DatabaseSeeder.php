<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Post;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Category::create([
            'name' => 'Desenvolvimento',
            'slug' => 'desenvolvimento'
        ]);

        Category::create([
            'name' => 'Pessoal',
            'slug' => 'pessoal'
        ]);

        Category::create([
            'name' => 'Finanças',
            'slug' => 'financas'
        ]);

        Category::create([
            'name' => 'Entretenimento',
            'slug' => 'entretenimento'
        ]);

        User::factory(1)->create([
            'name' => 'Fernando H. Rocha',
            'email' => 'fhrlobacz@gmail.com',
            'is_admin' => true
        ]);

        User::factory(1)->create([
            'name' => 'Jessica C. F. Gomes',
            'email' => 'jessica.cfg@hotmail.com',
            'is_admin' => true
        ]);

        User::factory(1)->create([
            'name' => 'Marcolino Silva',
            'email' => 'marco@hotmail.com',
            'is_admin' => false
        ]);

        Post::factory(200)->create();
        Comment::factory(5000)->create();
    }
}
