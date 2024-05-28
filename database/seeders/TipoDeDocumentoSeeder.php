<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\TipoDeDocumento;

class TipoDeDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoDeDocumento::create(['nombre' => 'tesis']);
        TipoDeDocumento::create(['nombre' => 'libro']);
        TipoDeDocumento::create(['nombre' => 'proyecto de grado']);
        TipoDeDocumento::create(['nombre' => 'trabajo dirigido']);
        TipoDeDocumento::create(['nombre' => 'revista']);
    }
}
