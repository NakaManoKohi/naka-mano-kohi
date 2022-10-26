<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1,5),
            'title' => $this->faker->sentence(mt_rand(3,8)),
            'slug' => $this->faker->slug(3),
            'excerpt' => $this->faker->paragraph(),
            // 'body' => $this->faker->paragraph(mt_rand(4,8)),
            'body' => collect($this->faker->paragraphs(mt_rand(5,10)))->map(fn($p) => "<p>$p</p>")->implode('')
        ];
    }
}
