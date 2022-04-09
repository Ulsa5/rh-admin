<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
}
