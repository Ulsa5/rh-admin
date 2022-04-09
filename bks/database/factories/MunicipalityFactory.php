<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Municipality>
 */
class MunicipalityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => $this->faker->randomNumber(4, true),
            'name' => $this->faker->name(),
            'department_id' => $this->faker->numberBetween(1,22),
            'employee_id' => $this->faker->numberBetween(1,10)
        ];
    }
}
