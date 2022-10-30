<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'user_id' => mt_rand(1,5),
            // 'body' => $this->faker->paragraph(mt_rand(4,8)),
            'caption' => collect($this->faker->paragraphs(mt_rand(5,10)))->map(fn($p) => "<p>$p</p>")->implode('')
            
        ];
    }
}
