<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\SoftDeletes;

class Autor extends Model
{
    use CrudTrait;
    use HasFactory, SoftDeletes;

    protected $table = 'autores';

    protected $fillable = [
        'nombre',
    ];

    public function documentos(): HasMany
    {
        return $this->hasMany(Documento::class);
    }
}
