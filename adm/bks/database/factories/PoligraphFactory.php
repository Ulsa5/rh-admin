<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poligraph>
 */
class PoligraphFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'result' => $this->faker->sentence(),
            'comment' => $this->faker->paragraph(),
            'employee_id' => $this->faker->numberBetween(1,10)
        ];
    }
}
