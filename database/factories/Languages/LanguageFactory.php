<?php

namespace Database\Factories\Languages;

use Illuminate\Database\Eloquent\Factories\Factory;

class LanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->country(),
            'locale' => $this->faker->countryCode(),
            'lc' => $this->faker->languageCode(),
            'status' => $this->faker->numberBetween(1,2),
        ];
    }
}
