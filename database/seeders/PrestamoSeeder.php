<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Seeder;

use App\Models\Prestamo;

class PrestamoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = Storage::disk('local')->get('/json/prestamos.json');
        $prestamos = json_decode($json, true);

        foreach ($prestamos as $prestamo) {
            $a = Prestamo::create($prestamo);
        }
    }
}
