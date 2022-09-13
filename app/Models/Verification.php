<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }

    public function verificationType()
    {
        return $this->belongsTo('App\Models\VerificationType');
    }
}
