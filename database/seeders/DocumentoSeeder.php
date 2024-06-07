<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Seeder;

use App\Models\Documento;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Documento::withoutEvents(function () {
            $json = Storage::disk('local')->get('/json/documentos.json');
            $documentos = json_decode($json, true);
            foreach ($documentos as $documento) {
                Documento::create([
                    'nombre' => $documento['nombre'],
                    'descripcion' => $documento['descripcion'],
                    'tipo_id' => $documento['tipo_id'],
                    'autor_id' => $documento['autor_id'],
                    'encargado_id' => $documento['encargado_id'],
                ])->categorias()->sync($documento['categorias']);
            }
        });
    }
}
