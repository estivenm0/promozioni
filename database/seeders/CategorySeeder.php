<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => "Electrónica"],
            ['name' => "Moda"],
            ['name' => "Salud y Belleza"],
            ['name' => "Hogar y Jardín"],
            ['name' => "Deportes y Aire Libre"],
            ['name' => "Automóviles"],
            ['name' => "Viajes"],
            ['name' => "Restaurantes"],
            ['name' => "Entretenimiento"],
            ['name' => "Tecnología"],
            ['name' => "Educación"],
            ['name' => "Juguetes"],
            ['name' => "Libros"],
            ['name' => "Música"],
            ['name' => "Computadoras"],
            ['name' => "Teléfonos Móviles"],
            ['name' => "Electrodomésticos"],
            ['name' => "Muebles"],
            ['name' => "Decoración del Hogar"],
            ['name' => "Fitness"],
            ['name' => "Ropa"],
            ['name' => "Productos Naturales"],
            ['name' => "Servicios de Belleza"],
        ];

        DB::table('categories')->insert($categories);
    }
}
