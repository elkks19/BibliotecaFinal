<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Model
{
    use CrudTrait;
    use HasFactory, SoftDeletes;

    protected $table = 'reservas';

    protected $fillable = [
        'copia_id',
        'estudiante_id',
        'fechaReserva',
        'isCancelado',
    ];

    protected function casts(){
        return [
            'fechaReserva' => 'date',
        ];
    }

    public function copia(){
        return $this->belongsTo(Copia::class);
    }

    public function estudiante(){
        return $this->belongsTo(User::class);
    }

    public function prestamo(){
        return $this->hasOne(Prestamo::class);
    }
}
