<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * Class Actor
 *
 * @property int $id
 * @property string $nombre
 * @property string $nombre_real
 * @property Carbon $edad
 * @property Carbon|null $defuncion
 * @property string $pais
 * @property Carbon $creado
 * @property Carbon $modificado
 *
 * @property Collection|Obra[] $obras
 *
 * @package App\Models
 */
class Actor extends Model
{
    const CREATED_AT = 'creado';
    const UPDATED_AT = 'modificado';

    /**
     * Castings
     *
     * @var string[]
     */
    protected $casts = [
        'edad' => 'datetime',
        'defuncion' => 'datetime',
    ];

    /**
     * Atributos asignables.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'nombre_real',
        'edad',
        'pais',
        'defuncion'
    ];

    /**
     * Obtiene los directores de la obra
     */
    public function obras(): BelongsToMany
    {
        return $this->belongsToMany(Obra::class);
    }
}
