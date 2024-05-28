<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Seeder;

use App\Models\Autor;

class AutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = Storage::disk('local')->get('/json/autores.json');
        $autores = json_decode($json, true);

        foreach ($autores as $autor) {
            Autor::create([
                'nombre' => $autor['nombre'],
            ]);
        }
    }
}
