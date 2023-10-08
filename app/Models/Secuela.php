<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Secuela
 *
 * @property int $saga_id
 * @property int $obra_id
 * @property int $orden
 * @property string $saga
 * @property Carbon $creada
 * @property Carbon $modificada
 *
 * @property Obra $obra
 *
 * @package App\Models
 */
class Secuela extends Model
{
    /**
     * Primary key.
     *
     * @var integer
     */
    protected $primaryKey = 'obra_id';

    /**
     * Indica si hay auto-increment.
     *
     * @var bool
     */
    public $incrementing = false;

    const CREATED_AT = 'creada';
    const UPDATED_AT = 'modificada';

    /**
     * Castings
     *
     * @var string[]
     */
    protected $casts = [
        'saga_id' => 'int',
        'obra_id' => 'int',
        'orden' => 'int',
        'creada' => 'datetime',
        'modificada' => 'datetime'
    ];

    /**
     * Atributos asignables.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'saga_id',
        'obra_id',
        'orden',
        'saga'
    ];

    /**
     * Obtiene la obra.
     */
    public function obra(): BelongsTo
    {
        return $this->belongsTo(Obra::class);
    }
}
