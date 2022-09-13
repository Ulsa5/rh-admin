<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kin extends Model
{
    use HasFactory;

    public function kinType()
    {
        return $this->belongsTo('App\Models\KinType');
    }

    public function employees()
    {
        return $this->belongsToMany('App\Models\Employee');
    }
}
