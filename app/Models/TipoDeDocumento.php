<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\SoftDeletes;

class TipoDeDocumento extends Model
{
    use CrudTrait;
    use HasFactory, SoftDeletes;

    protected $table = 'tipos_de_documento';

    protected $fillable = [
        'nombre',
    ];

    public function documentos(): HasMany
    {
        return $this->hasMany(Documento::class);
    }

}
