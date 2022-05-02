<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoligraphType extends Model
{
    use HasFactory;

    public function poligraphs()
    {
        return $this->hasMany('App\Models\Poligraph');
    }
}
