<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
            'name' => $this->faker->unique()->text(10)'.mp4',
            'path' => $this->faker->randomElement(Storage::files('/public/tmp/audio')),
            'size' => $this->faker->randomFloat(2, 700, 2000),
            'translated' => $this->faker->randomElement([0, 1, null]),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
