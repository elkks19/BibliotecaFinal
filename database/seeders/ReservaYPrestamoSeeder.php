<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reserva;
use App\Models\Prestamo;

class ReservaYPrestamoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 250 reservas
        Reserva::factory()->count(250)->create()->each(function ($reserva) {
            // Crear préstamo solo si la reserva no está cancelada
            if (!$reserva->isCancelado) {
                Prestamo::factory()->create(['reserva_id' => $reserva->id]);
            }
        });
    }
}
