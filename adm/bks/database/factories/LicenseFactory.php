<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\License>
 */
class LicenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'number'=>$this->faker->randomNumber(8,true),
            'expiration'=>$this->faker->date(),
            'employee_id'=> $this->faker->numberBetween(1,10)

        ];
    }
}
