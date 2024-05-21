<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categoria extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
    ];

    public function documentos(): BelongsToMany
    {
        return $this->belongsToMany(Documento::class, 'categorias_por_documento');
    }
}
