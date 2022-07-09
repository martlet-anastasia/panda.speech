<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(10).'.mp4',
            'path' => $this->faker->filePath(),
            'size' => $this->faker->randomFloat(2, 0.1, 10),
            'translated' => $this->faker->randomElement([0, 1, null]),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
