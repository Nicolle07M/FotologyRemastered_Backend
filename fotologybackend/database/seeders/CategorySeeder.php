<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Retrato', 'description' => 'Fotografía de retratos'],
            ['name' => 'Paisaje', 'description' => 'Fotografía de paisajes naturales'],
            ['name' => 'Boda', 'description' => 'Fotografía de bodas y eventos'],
            ['name' => 'Producto', 'description' => 'Fotografía de productos para publicidad'],
            ['name' => 'Deportes', 'description' => 'Fotografía de eventos deportivos'],
            ['name' => 'Gastronomía', 'description' => 'Fotografía de alimentos y bebidas'],
            ['name' => 'Moda', 'description' => 'Fotografía de moda y estilo'],
            ['name' => 'Arquitectura', 'description' => 'Fotografía de edificios y estructuras'],
            ['name' => 'Viajes', 'description' => 'Fotografía de viajes y destinos turísticos'],
            ['name' => 'Naturaleza', 'description' => 'Fotografía de la naturaleza y vida silvestre'],
            ['name' => 'Eventos', 'description' => 'Fotografía de eventos y celebraciones'],
            ['name' => 'Familia', 'description' => 'Fotografía familiar y de niños'],
            ['name' => 'Conceptual', 'description' => 'Fotografía conceptual y artística'],
            ['name' => 'Documental', 'description' => 'Fotografía documental y de reportaje'],
            ['name' => 'Aérea', 'description' => 'Fotografía aérea y de drones'],
            ['name' => 'Nocturna', 'description' => 'Fotografía nocturna y astrofotografía'],
            ['name' => 'Macro', 'description' => 'Fotografía macro y de detalles'],
            ['name' => 'Callejera', 'description' => 'Fotografía callejera y urbana'],
            ['name' => 'Subacuática', 'description' => 'Fotografía subacuática y marina'],
            ['name' => 'Retrato de Mascotas', 'description' => 'Fotografía de mascotas y animales'],
            ['name' => 'Fotografía de Productos', 'description' => 'Fotografía de productos para comercio electrónico'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}