<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KinType extends Model
{
    use HasFactory;

    //Kin es un pariente

    public function kins()
    {
        return $this->hasMany('App\Models\Kin');
    }
    
}
