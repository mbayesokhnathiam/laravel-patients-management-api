<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nom
 * @property string $prenom
 * @property int $age
 * @property string $datenais
 * @property boolean $sexe
 * @property string $cellulaire
 * @property string $prefession
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Consultation[] $consultations
 * @property Rendezvous[] $rendezvouses
 */
class patient extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['nom', 'prenom', 'age', 'datenais', 'sexe', 'cellulaire', 'prefession', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultations()
    {
        return $this->hasMany('App\Consultation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rendezvouses()
    {
        return $this->hasMany('App\Rendezvous');
    }
}
