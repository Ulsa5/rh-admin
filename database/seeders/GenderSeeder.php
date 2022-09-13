<?php

namespace Database\Seeders;

use App\Models\Genders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender = new Genders();
        $gender->name = "masculino";
        $gender->save();

        $gender1 = new Genders();
        $gender1->name = "femenino";
        $gender1->save();
    }
}
