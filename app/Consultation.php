<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $patient_id
 * @property integer $medecin_id
 * @property string $dateconsultation
 * @property string $numconsultation
 * @property string $observation
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Patient $patient
 * @property Constante[] $constantes
 */
class Consultation extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'consultation';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['patient_id', 'medecin_id', 'dateconsultation', 'numconsultation', 'observation', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'medecin_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function constantes()
    {
        return $this->hasMany('App\Constante');
    }
}
