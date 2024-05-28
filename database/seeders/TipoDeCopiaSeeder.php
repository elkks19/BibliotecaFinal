<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Seeder;

use App\Models\TipoDeCopia;

class TipoDeCopiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoDeCopia::create(['nombre' => 'digital']);
        TipoDeCopia::create(['nombre' => 'fisica']);
    }
}
