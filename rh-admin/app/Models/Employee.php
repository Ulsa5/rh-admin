<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function blood()
    {
        return $this->belongsTo('App\Models\Blood');
    }

    public function gender()
    {
        return $this->belongsTo('App\Models\Genders');
    }

    public function civilStatus()
    {
        return $this->belongsTo('App\Models\CivilStatus');
    }

    public function bank()
    {
        return $this->belongsTo('App\Models\Bank');
    }

    public function bankAccountType()
    {
        return $this->belongsTo('App\Models\BankAccountType');
    }

    public function igssAfilliation()
    {
        return $this->belongsTo('App\Models\IgssAfilliation');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function job()
    {
        return $this->belongsTo('App\Models\Job');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function insurance()
    {
        return $this->belongsTo('App\Models\Insurance');
    }

    public function municipality()
    {
        return $this->belongsTo('App\Models\Municipality');
    }

    public function licenses()
    {
        return $this->hasMany('App\Models\License');
    }

    public function updatableDocuments()
    {
        return $this->hasMany('App\Models\UpdatableDocument');
    }

    public function suspensions()
    {
        return $this->hasMany('App\Models\Suspension');
    }

    public function vacations()
    {
        return $this->hasMany('App\Models\Vacation');
    }

    public function attentionCalls()
    {
        return $this->hasMany('App\Models\AttentionCall');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function verifications()
    {
        return $this->hasMany('App\Models\Verification');
    }

    public function poligraphs()
    {
        return $this->hasMany('App\Models\Poligraph');
    }

    public function capacitations()
    {
        return $this->hasMany('App\Models\Capacitation');
    }

    //Relación muchos a muchos
    public function vaccines()
    {
        return $this->belongsToMany('App\Models\Vaccine');
    }

    public function kins()
    {
        return $this->belongsToMany('App\Models\Kin');
    }


}
