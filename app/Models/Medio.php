<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Medio
 *
 * @property int $id
 * @property string $nombre
 * @property string $web
 * @property Carbon $creado
 * @property Carbon $modificado
 *
 * @property Collection|Profesional[] $profesionals
 *
 * @package App\Models
 */
class Medio extends Model
{
    const CREATED_AT = 'creado';
    const UPDATED_AT = 'modificado';

    /**
     * Castings
     *
     * @var string[]
     */
    protected $casts = [
        'creado' => 'datetime',
        'modificado' => 'datetime'
    ];

    /**
     * Atributos asignables.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nombre',
        'web',
    ];

    /**
     * Obtener las criticas profesionales.
     */
    public function profesionals(): HasMany
    {
        return $this->hasMany(Profesional::class);
    }
}
