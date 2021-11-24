<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'user_id' => round(($this->faker->randomDigitNotZero()+7)/8),
            'post_id' => $this->faker->randomDigitNotZero(),
            'body' => $this->faker->paragraph
        ];
    }
}
