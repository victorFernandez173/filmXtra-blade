<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Director
 *
 * @property int $id
 * @property string $nombre
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
class Director extends Model
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
        'creado' => 'datetime',
        'modificado' => 'datetime'
    ];

    /**
     * Atributos asignables
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'edad',
        'pais',
        'defuncion'
    ];

    /**
     * Obras del director
     * @return BelongsToMany
     */
    public function obras(): BelongsToMany
    {
        return $this->belongsToMany(Obra::class);
    }
}
