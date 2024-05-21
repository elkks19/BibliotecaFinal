<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prestamo extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'prestamos';

    protected $fillable = [
        'reserva_id',
        'encargado_id',
        'fechaPrestamo',
        'fechaDevolucion',
        'fechaLimite'
    ];

    protected function casts(){
        return [
            'fechaPrestamo' => 'date',
            'fechaDevolucion' => 'date',
            'fechaLimite' => 'date',
        ];
    }

    public function reserva(): BelongsTo
    {
        return $this->belongsTo(Reserva::class);
    }

    public function encargado(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
