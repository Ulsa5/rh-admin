<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new Company();
        $company->name = "Sistemas Integrales de Seguridad, S. A.";
        $company->nit = "599191-9";
        $company->save();

        $company2 = new company();
        $company2->name = "Sistemas Globales de Seguridad, S. A.";
        $company2->nit = "pendiente";
        $company2->save();

        $company3 = new company();
        $company3->name = "Gold Eagle, S. A.";
        $company3->nit = "pendiente";
        $company3->save();

        $company6 = new company();
        $company6->name = "Antigua Memories Forever, S. A.";
        $company6->nit = "pendiente";
        $company6->save();

        $company4 = new company();
        $company4->name = "Fuelcheck Solutions, S. A.";
        $company4->nit = "pendiente";
        $company4->save();

        $company5 = new company();
        $company5->name = "Sherut, S. A.";
        $company5->nit = "pendiente";
        $company5->save();
    }
}
