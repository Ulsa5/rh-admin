<?php

namespace Database\Seeders;

use App\Models\CapacitationType;
use Illuminate\Database\Seeder;

class CapacitationTypeSeeder extends Seeder
{
    
    public function run()
    {
        $capacitation = new CapacitationType();
        $capacitation->name = "Ingreso";
        $capacitation->save();

        $capacitation = new CapacitationType();
        $capacitation->name = "Poligono";
        $capacitation->save();

        $capacitation = new CapacitationType();
        $capacitation->name = "Refrescamiento";
        $capacitation->save();

        $capacitation = new CapacitationType();
        $capacitation->name = "Anual";
        $capacitation->save();

        $capacitation = new CapacitationType();
        $capacitation->name = "Solicitado por el cliente";
        $capacitation->save();
    }
}
