<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            TipoDeDocumentoSeeder::class,
            TipoDeCopiaSeeder::class,
            CategoriaSeeder::class,
            AutorSeeder::class,
            DocumentoSeeder::class,
            CopiaSeeder::class,
            /**
             *  PARA SEEDEAR USANDO LAS FACTORIES
             */
            // ReservaYPrestamoSeeder::class,
            /**
             *  PARA SEEDEAR USANDO LOS ARCHIVOS JSON
             */
            ReservaSeeder::class,
            PrestamoSeeder::class,

        ]);

    }
}
