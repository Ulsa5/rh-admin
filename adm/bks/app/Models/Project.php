<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    //Relación uno a muchos
    public function projectType()
    {
        return $this->belongsTo('App\Models\ProjectType');
    }

    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
