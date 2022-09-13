<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    //Relación muchos a muchos inversa polimorfica
    // public function employees()
    // {
    //     return $this->morphedByMany('App\Models\Employee', 'vaccineable');
    // }

    // public function vaccineDoses()
    // {
    //     return $this->morphedByMany('App\Models\VaccineDosis', 'vaccineable');
    // }

    //Relación inversa vacunas->empleados
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }
}
