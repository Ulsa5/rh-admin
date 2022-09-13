<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use HasFactory;

    //Relación uno a muchos inversa
    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }
}
