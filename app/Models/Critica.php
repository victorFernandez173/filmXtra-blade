<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Critica
 *
 * @property int $id
 * @property int $obra_id
 * @property int $user_id
 * @property string $critica
 * @property Carbon $creada
 * @property Carbon $modificada
 *
 * @property Obra $obra
 * @property User $user
 * @property Collection|Like[] $likes
 *
 * @package App\Models
 */
class Critica extends Model
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
        'user_id' => 'int',
        'creada' => 'datetime',
        'modificada' => 'datetime'
    ];

    /**
     * Atributos asignables
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'obra_id',
        'user_id',
        'critica',
    ];

    /**
     * Obtiene la obra de la crítica
     */
    public function obra(): BelongsTo
    {
        return $this->belongsTo(Obra::class);
    }

    /**
     * Obtiene el usuario de la crítica
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtiene los likes de la critica
     */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'likes', 'critica_id', 'user_id', 'id');
    }
}
