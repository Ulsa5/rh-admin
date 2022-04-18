<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poligraph extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }

    public function poligraphTypes()
    {
        return $this->hasMany('App\Models\PoligraphType');
    }
}
