<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Trailer
 *
 * @property int $obra_id
 * @property string $trailers
 *
 * @property Obra $obra
 *
 * @package App\Models
 */
class Trailer extends Model
{
    /**
     * Clave primaria.
     *
     * @var integer
     */
    protected $primaryKey = 'obra_id';

    /**
     * Indica si hay auto_increment.
     *
     * @var bool
     */
    public $incrementing = false;

    const CREATED_AT = 'creado';
    const UPDATED_AT = 'modificado';

    /**
     * Atributos asignables.
     *
     * @var int[]
     */
    protected $fillable = [
        'obra_id',
        'trailers',
    ];

    /**
     * Castings
     *
     * @var string[]
     */
	protected $casts = [
		'obra_id' => 'int',
        'creado' => 'datetime',
        'modificado' => 'datetime'
	];

    /**
     * Obtiene la obra
     *
     * @return BelongsTo
     */
	public function obra(): BelongsTo
	{
		return $this->belongsTo(Obra::class);
	}
}
