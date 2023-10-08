<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Festival
 *
 * @property int $id
 * @property int $obra_id
 * @property string $nombre
 * @property Carbon $edicion
 * @property Carbon $creada
 * @property Carbon $modificada
 *
 * @property Obra $obra
 *
 * @package App\Models
 */
class Festival extends Model
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
        'edicion' => 'date:Y',
    ];

    /**
     * Atributos asignables
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'edicion',
    ];

    /**
     * Obtiene la obra
     * @return BelongsTo
     */
    public function obra(): BelongsTo
    {
        return $this->belongsTo(Obra::class);
    }
}
