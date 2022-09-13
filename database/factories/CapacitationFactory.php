<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Capacitation>
 */
class CapacitationFactory extends Factory
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
            'instructor' => $this->faker->name(),
            'comment' => $this->faker->sentence(),
            'employee_id'=> $this->faker->numberBetween(1,10),
            'capacitation_type_id'=> $this->faker->numberBetween(1,4)
        ];
    }
}
