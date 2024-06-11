<?php

namespace Database\Factories;

use App\Models\Reserva;
use App\Models\Copia;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ReservaFactory extends Factory
{
    protected $model = Reserva::class;

    public function definition()
    {
        return [
            'fechaReserva' => Carbon::now()->subDays(rand(0, 90))->format('Y-m-d'),
            'copia_id' => Copia::inRandomOrder()->first()->id,

            'estudiante_id' => User::whereHas('roles', function ($query) {
                $query->where('name', 'estudiante');
            })->inRandomOrder()->first()->id,

            'isCancelado' => $this->faker->boolean(10), // 20% de posibilidad de que la reserva esté cancelada
        ];
    }
}
