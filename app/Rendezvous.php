<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $patient_id
 * @property integer $secretaire_id
 * @property string $numrendezvous
 * @property string $daterendezvous
 * @property string $note
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Patient $patient
 * @property User $user
 */
class Rendezvous extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'rendezvous';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['patient_id', 'secretaire_id', 'numrendezvous', 'daterendezvous', 'note', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'secretaire_id');
    }
}
