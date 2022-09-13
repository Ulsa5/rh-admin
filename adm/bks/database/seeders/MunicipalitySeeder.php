<?php

namespace Database\Seeders;

use App\Models\Municipality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        //Guatemala
        for ($i=0; $i < 17; $i++)
        {
            $municipality = new Municipality();
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 1;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //El Progreso
        for ($i=0; $i < 8; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 2;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Sacatepéquez
        for ($i=0; $i < 16; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 3;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Chimaltenango 
        for ($i=0; $i < 16; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 4;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Escuintla 
        for ($i=0; $i < 13; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 5;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Santa Rosa 
        for ($i=0; $i < 14; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 6;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Sololá 
        for ($i=0; $i < 19; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 7;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Totonicapán 
        for ($i=0; $i < 8; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 8;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Quetzaltenango 
        for ($i=0; $i < 24; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 9;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Suchitepéquez 
        for ($i=0; $i < 21; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 10;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Retalhuleu
        for ($i=0; $i < 9; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 11;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //San Marcos 
        for ($i=0; $i < 30; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 12;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Huehuetenango 
        for ($i=0; $i < 32; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 13;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Quiché
        for ($i=0; $i < 22; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 14;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Baja Verapaz 
        for ($i=0; $i < 8; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 8;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Alta Verapaz 
        for ($i=0; $i < 17; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 16;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Petén 
        for ($i=0; $i < 14; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 17;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Izabal 
        for ($i=0; $i < 5; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 18;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Zacapa 
        for ($i=0; $i < 11; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 19;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Chiquimula 
        for ($i=0; $i < 11; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 20;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Jalapa 
        for ($i=0; $i < 7; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 21;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }

        //Jutiapa 
        for ($i=0; $i < 17; $i++)
        {
            $municipality = new Municipality();
            // $municipality->code = json_encode('0'.$i+1);
            $municipality->code = $i+1;
            $municipality->name ='Municipio '.$i+1;
            $municipality->department_id = 22;
            $municipality->employee_id = $this->faker->numberBetween(1,10);
            $municipality->save(); 
        }


        
    }
}
