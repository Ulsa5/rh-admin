<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    public function vaccinedosis()
    {
        return $this->belongsToMany('App\Models\VaccineDosis');
    }

    public function employees()
    {
        return $this->belongsToMany('App\Models\Employee');
    }
}
