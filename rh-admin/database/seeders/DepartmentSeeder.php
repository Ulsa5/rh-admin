<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 22; $i++)
        {
            $department = new Department();
            // $department->code = json_encode('0'.$i+1);
            $department->code = $i+1;
            $department->name ='Departamento '.$i+1;
            $department->save(); 
        }
        
        // $company = new Company();
        // $company->name = "Sistemas Integrales de Seguridad, S. A.";
        // $company->nit = "599191-9";
        // $company->save();
    }
}
