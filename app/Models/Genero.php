<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Validation\Rules\Enum;

/**
 * Class Genero
 *
 * @property int $id
 * @property string $genero
 * @property Carbon $creado
 * @property Carbon $modificado
 *
 * @property Collection|Obra[] $obras
 *
 * @package App\Models
 */
class Genero extends Model
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
     * Atributos asignables
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'genero',
    ];
    /**
     * Obtiene las obras
     */
    public function obras(): BelongsToMany
    {
        return $this->belongsToMany(Obra::class);
    }
}
