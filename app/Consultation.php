<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $guarded = ['id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
     public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
    public function medecin()
    {
        return $this->belongsTo('App\User', 'medecin_id');
    }

    public function constante()
    {
        return $this->hasMany('App\constantes');
    }
}

 