<?php

namespace Database\Seeders;

use App\Models\VaccineDosis;
use Illuminate\Database\Seeder;

class VaccineDoseSeeder extends Seeder
{
    
    public function run()
    {
        $gender = new VaccineDosis();
        $gender->dosis = "primera";
        $gender->save();

        $gender = new VaccineDosis();
        $gender->dosis = "segunda";
        $gender->save();
        
        $gender = new VaccineDosis();
        $gender->dosis = "tercera";
        $gender->save();

        $gender = new VaccineDosis();
        $gender->dosis = "cuarta";
        $gender->save();

        $gender = new VaccineDosis();
        $gender->dosis = "otra";
        $gender->save();
    }
}
