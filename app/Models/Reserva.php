<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Model
{
    use CrudTrait;
    use HasFactory, SoftDeletes;

    protected $table = 'reservas';

    protected $appends = ['nombreDocumento'];

    protected $fillable = [
        'copia_id',
        'estudiante_id',
        'fechaReserva',
        'isCancelado',
        'isAprobado',
        'nombreArchivo',
    ];

    protected $attributes = [
        'isCancelado' => 0,
        'isAprobado' => 0,
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

    public function nombreDocumento(): Attribute
    {
        return new Attribute(
            get: fn() => $this->copia->documento->nombre
        );
    }

    public function nombreEstudiante(): Attribute
    {
        return new Attribute(
            get: fn() => $this->estudiante->name
        );
    }
}
