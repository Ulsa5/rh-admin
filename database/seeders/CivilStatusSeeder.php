<?php

namespace Database\Seeders;

use App\Models\CivilStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CivilStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $civilStatus = new CivilStatus();
        $civilStatus->name = "soltero";
        $civilStatus->comment = "comentario_soltero";
        $civilStatus->save();

        $civilStatus2 = new CivilStatus();
        $civilStatus2->name = "casado";
        $civilStatus2->comment = "comentario_casado";
        $civilStatus2->save();

        $civilStatus3 = new CivilStatus();
        $civilStatus3->name = "viudo";
        $civilStatus3->comment = "comentario_viudo";
        $civilStatus3->save();

        $civilStatus4 = new CivilStatus();
        $civilStatus4->name = "divorciado";
        $civilStatus4->comment = "comentario_divorciado";
        $civilStatus4->save();

        $civilStatus5 = new CivilStatus();
        $civilStatus5->name = "separado";
        $civilStatus5->comment = "comentario_separado";
        $civilStatus5->save();
    }
}
