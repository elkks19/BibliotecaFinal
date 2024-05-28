<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Seeder;

use App\Models\Copia;

class CopiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = Storage::disk('local')->get('/json/copias.json');
        $copias = json_decode($json, true);

        foreach ($copias as $copia) {
            Copia::create($copia);
        }
    }
}
