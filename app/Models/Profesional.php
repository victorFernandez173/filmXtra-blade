<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Profesional
 *
 * @property int $id
 * @property int $obra_id
 * @property int $medio_id
 * @property string $autor
 * @property string $contenido
 * @property Carbon $fecha
 * @property Carbon $creada
 * @property Carbon $modificada
 *
 * @property Medio $medio
 * @property Obra $obra
 *
 * @package App\Models
 */
class Profesional extends Model
{
    const CREATED_AT = 'creada';
    const UPDATED_AT = 'modificada';

    /**
     * Castings
     *
     * @var string[]
     */
    protected $casts = [
        'obra_id' => 'int',
        'medio_id' => 'int',
        'fecha' => 'date',
        'creada' => 'datetime',
        'modificada' => 'datetime'
    ];

    /**
     * Atributos asignables.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'obra_id',
        'medio_id',
        'autor',
        'contenido',
        'fecha'
    ];

    /**
     * Obtiene el director
     */
    public function obra(): BelongsTo
    {
        return $this->belongsTo(Obra::class);
    }

    /**
     * Obtiene el medio
     */
    public function medio(): BelongsTo
    {
        return $this->belongsTo(Medio::class);
    }
}
