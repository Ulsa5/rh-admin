<?php

namespace Database\Seeders;

use App\Models\Vaccine;
use Illuminate\Database\Seeder;

class VaccineSeeder extends Seeder
{
    
    public function run()
    {
        $gender = new Vaccine();
        $gender->name = "Moderna";
        $gender->save();

        $gender = new Vaccine();
        $gender->name = "Sputnik";
        $gender->save();

        $gender = new Vaccine();
        $gender->name = "Pfizer";
        $gender->save();

        $gender = new Vaccine();
        $gender->name = "Jhonson";
        $gender->save();

        $gender = new Vaccine();
        $gender->name = "AstraZeneca";
        $gender->save();
    }
}
