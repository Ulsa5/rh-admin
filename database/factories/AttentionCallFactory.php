<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AttentionCall>
 */
class AttentionCallFactory extends Factory
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
            'reason' => $this->faker->sentence(10),
            'comment' => $this->faker->paragraph(3),
            'employee_id' => $this->faker->numberBetween(1,10)
        ];
    }
}
