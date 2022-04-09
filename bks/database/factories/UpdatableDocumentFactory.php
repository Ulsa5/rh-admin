<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UpdatableDocument>
 */
class UpdatableDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'number' => $this->faker->randomNumber(5, true),
            'verificator' => $this->faker->bothify('???-###'),
            'expiration' => $this->faker->date(),
            'employee_id' => $this->faker->numberBetween(1,10)
        ];
    }
}
