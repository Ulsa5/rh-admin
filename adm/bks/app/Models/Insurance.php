<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    public function Company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
