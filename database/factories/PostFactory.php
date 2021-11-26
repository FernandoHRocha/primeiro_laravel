<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => ($this->faker->randomDigit/10)+1,
            'category_id' => $this->faker->randomElement([rand(1,count(Category::all()))]),
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'excerpt' => '<p>' . implode('</p><p>',$this->faker->paragraphs(2)) . '</p>',
            'body' => '<p>' . implode('</p><p>',$this->faker->paragraphs(6)) . '</p>'
        ];
    }
}
