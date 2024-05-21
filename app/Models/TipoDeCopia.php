<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\SoftDeletes;

class TipoDeCopia extends Model
{
    use CrudTrait;
    use HasFactory, SoftDeletes;

    protected $table = 'tipos_de_copia';

    protected $fillable = [
        'nombre',
    ];

    public function copias(): HasMany
    {
        return $this->hasMany(Copia::class);
    }
}
