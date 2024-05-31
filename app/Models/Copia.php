<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
Use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Copia extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'copias';

    protected $appends = ['nombreDocumento'];
    protected $fillable = [
        'documento_id',
        'tipo_id',
        'editorial',
        'fechaDePublicacion',
    ];

    public function documento(): BelongsTo
    {
        return $this->belongsTo(Documento::class);
    }

    public function tipo(): BelongsTo
    {
        return $this->belongsTo(TipoDeCopia::class);
    }

    public function descargas(): HasMany
    {
        return $this->hasMany(Prestamos::class);
    }

    public function reservas(): HasMany
    {
        return $this->hasMany(Reserva::class);
    }

    protected function nombreDocumento(): Attribute
    {
        return new Attribute(
            get: fn () => $this->documento->nombre,
        );
    }
}
