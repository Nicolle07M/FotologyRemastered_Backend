<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DocumentType;
use Carbon\Carbon;

class DocumentTypeSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $types = [
            ['name' => 'Tarjeta de identidad', 'abbreviation' => 'TI'],
            ['name' => 'Cédula de ciudadanía', 'abbreviation' => 'CC'],
            ['name' => 'Cédula de extranjería', 'abbreviation' => 'CE'],
            ['name' => 'Registro civil', 'abbreviation' => 'RC'],
            ['name' => 'Pasaporte', 'abbreviation' => 'PAS'],
        ];

        foreach ($types as $type) {
            DocumentType::create([
                'name' => $type['name'],
                'abbreviation' => $type['abbreviation'],
            ]);
        }
    }
}
