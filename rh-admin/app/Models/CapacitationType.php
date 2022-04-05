<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapacitationType extends Model
{
    use HasFactory;

    public function capacitation()
    {
        return $this->belongsTo('App\Models\Capacitaion');
    }
}
