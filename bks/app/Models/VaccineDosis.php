<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineDosis extends Model
{
    use HasFactory;
    
    public function vaccines()
    {
        return $this->belongsToMany('App\Models\Vaccine');
    }
}
