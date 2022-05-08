<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vaccine>
 */
class VaccineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'dosis_type' => $this->faker->name(),
            'dosis_date' => $this->faker->date(),
            'dosis_number' => $this->faker->word(6),
            'dosis_comment' => $this->faker->sentence(),
            'employee_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
