<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

use Illuminate\Database\Eloquent\SoftDeletes;

class Prestamo extends Model
{
    use CrudTrait;
    use HasFactory, SoftDeletes;

    protected $table = 'prestamos';

    protected $appends = [
        'nombreDocumento',
        'codigoCopia',
        'diasRetraso',
    ];

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

    protected function nombreDocumento(): Attribute
    {
        return new Attribute(
            get: fn () => $this->reserva->copia->documento->nombre,
        );
    }

    protected function codigoCopia(): Attribute
    {
        return new Attribute(
            get: fn () => $this->reserva->copia->codigo,
        );
    }

    protected function diasRetraso(): Attribute
    {
        return new Attribute(
            get: fn () => round($this->fechaLimite->diffInDays(now())),
        );
    }
}
