<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
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
            'dpi' => $this->faker->numberBetween(1111111111111,9999999999999),
            'admission_date' => $this->faker->date(),
            'carnet' => $this->faker->randomNumber(5,true),
            'carnet_expiration' => $this->faker->date(),
            'telephone' => $this->faker->randomNumber(8,true),
            'nit' => $this->faker->randomNumber(9, true),
            'irtra' => $this->faker->randomNumber(9, true),
            'educational_level' => $this->faker->sentence(),
            'email' => $this->faker->email(),
            'birthday' => $this->faker->date(),
            'children' => $this->faker->randomDigit(),
            'address' => $this->faker->sentence(),
            'bank_account_number' => $this->faker->numberBetween(11111111,99999999),
            'blood_id' => $this->faker->numberBetween(1,10),
            'gender_id' => $this->faker->numberBetween(1,2),
            'civil_status_id' => $this->faker->numberBetween(1,5),
            'bank_id' => $this->faker->numberBetween(1,10),
            'bank_account_type_id' => $this->faker->numberBetween(1,2),
            'igss_afilliation_id' => $this->faker->numberBetween(1,2),
            'company_id' => $this->faker->numberBetween(1,6),
            'job_id' => $this->faker->numberBetween(1,10),
            'project_id' => $this->faker->numberBetween(1,10),
            'insurance_id' => $this->faker->numberBetween(1,10) 
        ];
    }
}
