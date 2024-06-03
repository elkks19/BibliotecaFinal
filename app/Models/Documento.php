<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    use CrudTrait;
    use HasFactory, SoftDeletes;

    protected $table = 'documentos';

    protected $fillable = [
        'tipo_id',
        'autor_id',
        'encargado_id',
        'nombre',
        'descripcion',
    ];

    public function tipo(): BelongsTo
    {
        return $this->belongsTo(TipoDeDocumento::class);
    }

    public function categorias(): BelongsToMany
    {
        return $this->belongsToMany(Categoria::class, 'categorias_por_documento');
    }

    public function autor(): BelongsTo
    {
        return $this->belongsTo(Autor::class);
    }

    public function copias(): HasMany
    {
        return $this->hasMany(Copia::class);
    }

    public function encargado(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function descargas(): HasManyThrough
    {
        return $this->hasManyThrough(Descarga::class, Copia::class);
    }

    public function prestamos(): HasManyThrough
    {
        return $this->hasManyThrough(Prestamo::class, Copia::class);
    }

}
