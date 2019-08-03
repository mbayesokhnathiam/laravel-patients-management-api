<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $consultation_id
 * @property int $temperature
 * @property string $poids
 * @property string $pa
 * @property string $taille
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Consultation $consultation
 */
class constantes extends Model
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
    protected $fillable = ['consultation_id', 'temperature', 'poids', 'pa', 'taille', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function consultation()
    {
        return $this->belongsTo('App\Consultation');
    }
}
