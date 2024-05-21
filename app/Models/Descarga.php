<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\SoftDeletes;

class Descarga extends Model
{
    use CrudTrait;
    use HasFactory, SoftDeletes;

    protected $table = 'descargas';

    protected $fillable = [
        'estudiante_id',
        'copia_id',
        'fechaDescarga',
    ];

    protected function casts(){
        return [
            'fechaDescarga' => 'datetime',
        ];
    }

    public function estudiante(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function copia(): BelongsTo
    {
        return $this->belongsTo(Copia::class);
    }
}
