<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function insurances()
    {
        return $this->hasMany('App\Models\Insurance');
    }

    public function igss_afilliations()
    {
        return $this->hasMany('App\Models\IgssAfilliation');
    }

    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
