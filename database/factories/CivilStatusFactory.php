<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CivilStatus>
 */
class CivilStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->randomElement(['soltero','casado','viudo','divorciado','separado']),
            'comment' =>$this->faker->paragraph()
        ];
    }
}
