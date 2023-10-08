<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Obra
 *
 * @property int $id
 * @property string $titulo
 * @property string $titulo_original
 * @property string $pais
 * @property float $duracion
 * @property string $sinopsis
 * @property Carbon $fecha
 * @property string $productora
 * @property Carbon $creada
 * @property Carbon $modificada
 *
 * @property Collection|Actor[] $actors
 * @property Collection|Critica[] $criticas
 * @property Collection|Director[] $directors
 * @property Collection|Evaluacion[] $evaluaciones
 * @property Collection|Festival[] $festivals
 * @property Collection|Genero[] $generos
 * @property Poster $poster
 * @property Collection|Profesional[] $profesionals
 * @property Collection|Secuela[] $secuelas
 *
 * @package App\Models
 */
class Obra extends Model
{
    const CREATED_AT = 'creada';
    const UPDATED_AT = 'modificada';

    /**
     * Castings
     *
     * @var string[]
     */
    protected $casts = [
        'duracion' => 'float',
        'fecha' => 'date:Y',
        'creada' => 'datetime',
        'modificada' => 'datetime'
    ];

    /**
     * Atributos asignables.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titulo',
        'titulo_original',
        'pais',
        'duracion',
        'sinopsis',
        'fecha',
        'productora',
    ];

    /**
     * Obtener las secuelas.
     */
    public function secuela(): HasOne
    {
        return $this->hasOne(Secuela::class);
    }

    /**
     * Obtener el poster.
     */
    public function poster(): HasOne
    {
        return $this->hasOne(Poster::class);
    }

    /**
     * Obtener el trailer.
     */
    public function trailer(): HasOne
    {
        return $this->hasOne(Trailer::class);
    }

    /**
     * Obtener las críticas.
     */
    public function criticas(): HasMany
    {
        return $this->hasMany(Critica::class);
    }

    /**
     * Obtener las evaluaciones.
     */
    public function evaluaciones(): HasMany
    {
        return $this->hasMany(Evaluacion::class);
    }

    /**
     * Obtener los generos
     * @return BelongsToMany
     */
    public function generos(): BelongsToMany
    {
        return $this->belongsToMany(Genero::class);
    }

    /**
     * Obtener los directores
     */
    public function directors(): BelongsToMany
    {
        return $this->belongsToMany(Director::class);
    }

    /**
     * Obtener los festivales.
     */
    public function festivals(): HasMany
    {
        return $this->hasMany(Festival::class);
    }

    /**
     * Obtener las criticas profesionales.
     */
    public function profesionals(): HasMany
    {
        return $this->hasMany(Profesional::class);
    }

    /**
     * Obtener los actores
     */
    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class);
    }
}
