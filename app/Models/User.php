<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string|null $username
 * @property Carbon|null $age
 * @property string|null $country
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $social_id
 * @property string|null $social_type
 * @property int|null $number
 * @property string|null $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|Critica[] $criticas
 * @property Collection|Evaluacion[] $evaluaciones
 * @property Collection|Like[] $likes
 *
 * @package App\Models
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Atributos asignables.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'age',
        'country',
        'email',
        'password',
        'email_verified_at',
        'social_id',
        'social_type',
        'number'
    ];

    /**
     * Atributos escondidos.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Castings.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'age' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    /**
     * Obtiene las críticas.
     */
    public function criticas(): HasMany
    {
        return $this->hasMany(Critica::class);
    }

    /**
     * Obtiene las evaluaciones.
     */
    public function evaluaciones(): HasMany
    {
        return $this->hasMany(Evaluacion::class);
    }

    /**
     * Obtiene los likes.
     */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(Critica::class, 'likes', 'user_id', 'critica_id', 'id');
    }
}
