<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TranslateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'translated_at' => $this->faker->dateTime(),
            'text' => $this->faker->text(1000),
        ];
    }
}
