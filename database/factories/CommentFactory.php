<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomElement( [rand( 1, count( User::all() ) ) ] ),
            'post_id' => $this->faker->randomElement( [ rand( 1, count( Post::all() ) ) ] ),
            'body' => $this->faker->paragraph
        ];
    }
}
