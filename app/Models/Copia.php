<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
Use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

use App\Observers\CopiaObserver;

#[ObservedBy([CopiaObserver::class])]
class Copia extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'copias';

    protected $appends = ['nombreDocumento'];

    protected $attributes = ['isPrestado' => false];

    protected $fillable = [
        'isPrestado',
        'documento_id',
        'codigo',
        'tipo_id',
        'editorial',
        'fechaDePublicacion',
    ];

    public function prestar(): void
    {
        $this->isPrestado = true;
        $this->save();
    }
    public function devolver(): void
    {
        $this->isPrestado = false;
        $this->save();
    }

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
