<?php

namespace Database\Factories;

use App\Models\Prestamo;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PrestamoFactory extends Factory
{
    protected $model = Prestamo::class;

    public function definition()
    {
        $reserva = Reserva::inRandomOrder()->first();
        $fechaPrestamo = Carbon::parse($reserva->fechaReserva)->addDays(rand(1, 7));
        $fechaLimite = $fechaPrestamo->copy()->addDays(5);

        // Determinar si el libro ha sido devuelto, si la devolución está retrasada, o si no ha sido devuelto
        $no_devuelto = $this->faker->boolean(10); // 10% de posibilidad de que no haya sido devuelto
        $devolucion_retrasada = $this->faker->boolean(20) && !$no_devuelto; // 20% de posibilidad de devolución retrasada, si no está no devuelto

        if ($no_devuelto) {
            $fechaDevolucion = null;
        } elseif ($devolucion_retrasada) {
            $fechaDevolucion = $fechaLimite->copy()->addDays(rand(1, 3));
        } else {
            $fechaDevolucion = $fechaPrestamo->copy()->addDays(rand(1, 5));
        }

        return [
            'fechaPrestamo' => $fechaPrestamo->format('Y-m-d'),
            'fechaDevolucion' => $fechaDevolucion ? $fechaDevolucion->format('Y-m-d') : null,
            'fechaLimite' => $fechaLimite->format('Y-m-d'),
            'reserva_id' => $reserva->id,

            'encargado_id' => User::whereHas('roles', function ($query) {
                $query->where('name', 'encargado');
            })->inRandomOrder()->first()->id,
        ];
    }
}
