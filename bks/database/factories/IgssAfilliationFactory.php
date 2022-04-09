<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IgssAfilliation>
 */
class IgssAfilliationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'number' => $this->faker->randomNumber(9, true),
            'filial' => $this->faker->randomDigit(),
            'company_id' => $this->faker->numberBetween(1,6)
        ];
    }
}
