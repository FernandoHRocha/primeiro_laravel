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

        $user = User::create([
            'name' => 'Fernando H. Rocha',
            'slug' => 'fernando_rocha',
            'email' => 'fhrlobacz@gmail.com',
            'password' => bcrypt('123'),
            'is_admin' => true
        ]);

        $development = Category::create([
            'name' => 'Desenvolvimento',
            'slug' => 'desenvolvimento'
        ]);

        $personal = Category::create([
            'name' => 'Pessoal',
            'slug' => 'pessoal'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $development->id,
            'title' => 'Primeira Publicação',
            'slug' => 'primeira_publicacao',
            'excerpt' => 'O primeiros sempre é um lorem.',
            'body' => 'Sed laoreet odio id nunc viverra porttitor. Donec vulputate velit eget mauris lacinia blandit. Phasellus tempus rhoncus lacus, et feugiat risus egestas eu. Donec bibendum est hendrerit venenatis finibus. Donec tincidunt justo et sodales cursus. Cras quam sem, congue vel risus vel, tristique egestas lectus. Donec blandit nunc nec leo varius tincidunt. Phasellus eget felis quis turpis lacinia elementum at ac sapien. Sed tempor leo id mauris pellentesque gravida. Nullam sed tempus felis. Morbi sit amet interdum augue, vel aliquam tellus. Cras non ultrices metus. Duis tristique id elit in consequat. Duis euismod et ipsum et hendrerit. Duis sapien diam, condimentum sit amet vehicula ac, pellentesque a dolor. In fringilla at eros in bibendum.'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'Segunda Publicação',
            'slug' => 'segunda_publicacao',
            'excerpt' => 'A segunda publicação não pode mais ser um lorem.',
            'body' => 'Sed laoreet odio id nunc viverra porttitor. Donec vulputate velit eget mauris lacinia blandit. Phasellus tempus rhoncus lacus, et feugiat risus egestas eu. Donec bibendum est hendrerit venenatis finibus. Donec tincidunt justo et sodales cursus. Cras quam sem, congue vel risus vel, tristique egestas lectus. Donec blandit nunc nec leo varius tincidunt. Phasellus eget felis quis turpis lacinia elementum at ac sapien. Sed tempor leo id mauris pellentesque gravida. Nullam sed tempus felis. Morbi sit amet interdum augue, vel aliquam tellus. Cras non ultrices metus. Duis tristique id elit in consequat. Duis euismod et ipsum et hendrerit. Duis sapien diam, condimentum sit amet vehicula ac, pellentesque a dolor. In fringilla at eros in bibendum.'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $development->id,
            'title' => 'Terceira Publicação',
            'slug' => 'terceira_publicacao',
            'excerpt' => 'A importância da inclusão social dentro de ambientes corporativos.',
            'body' => 'Ut laoreet dignissim ex. Curabitur aliquam erat at mi laoreet, nec ultricies eros scelerisque. Etiam vitae gravida ex, eget vehicula justo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis ut rutrum ligula, et pharetra risus. Aenean sollicitudin lobortis mollis. Nulla eu lectus et sem maximus lobortis nec eget quam. Sed in egestas odio. Quisque tristique mauris quis lacinia suscipit. Nam sit amet sollicitudin dui. Vestibulum commodo iaculis dui, a porttitor nisl. Duis commodo fringilla urna ut sollicitudin. Mauris elementum suscipit felis ut egestas. Donec et est vitae eros porta faucibus. Nullam ut sem congue, ultricies mauris viverra, lobortis augue.'
        ]);

        $user = User::create([
            'name' => 'Jessica C. F. Gomes',
            'slug' => 'jessica_gomes',
            'email' => 'jessica.cfg@hotmail.com',
            'password' => bcrypt('123'),
            'is_admin' => true
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $development->id,
            'title' => 'Minha Primeira Publicação',
            'slug' => 'minha_primeira_publicacao',
            'excerpt' => 'O primeiros sempre é um lorem.',
            'body' => 'Sed laoreet odio id nunc viverra porttitor. Donec vulputate velit eget mauris lacinia blandit. Phasellus tempus rhoncus lacus, et feugiat risus egestas eu. Donec bibendum est hendrerit venenatis finibus. Donec tincidunt justo et sodales cursus. Cras quam sem, congue vel risus vel, tristique egestas lectus. Donec blandit nunc nec leo varius tincidunt. Phasellus eget felis quis turpis lacinia elementum at ac sapien. Sed tempor leo id mauris pellentesque gravida. Nullam sed tempus felis. Morbi sit amet interdum augue, vel aliquam tellus. Cras non ultrices metus. Duis tristique id elit in consequat. Duis euismod et ipsum et hendrerit. Duis sapien diam, condimentum sit amet vehicula ac, pellentesque a dolor. In fringilla at eros in bibendum.'
        ]);
    }
}
