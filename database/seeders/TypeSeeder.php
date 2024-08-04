<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => "Restaurantes"],
            ['name' => "Cafés"],
            ['name' => "Bares"],
            ['name' => "Supermercados"],
            ['name' => "Tiendas de Ropa"],
            ['name' => "Zapaterías"],
            ['name' => "Tiendas de Electrónica"],
            ['name' => "Farmacias"],
            ['name' => "Tiendas de Belleza"],
            ['name' => "Salones de Belleza"],
            ['name' => "Centros de Belleza y Estética"],
            ['name' => "Restaurantes de Comida Rápida"],
            ['name' => "Panaderías"],
            ['name' => "Pastelerías"],
            ['name' => "Joyerías"],
            ['name' => "Librerías"],
            ['name' => "Tiendas de Deportes"],
            ['name' => "Tiendas de Muebles"],
            ['name' => "Tiendas de Decoración"],
            ['name' => "Centros de Fitness"],
            ['name' => "Clínicas Dentales"],
            ['name' => "Spa"],
            ['name' => "Tiendas de Mascotas"],
            ['name' => "Talleres de Automóviles"],
            ['name' => "Agencias de Viajes"],
            ['name' => "Hoteles"],
            ['name' => "Alquiler de Vehículos"],
            ['name' => "Tiendas de Herramientas"],
            ['name' => "Estaciones de Servicio"],
            ['name' => "Centros de Salud"],
            ['name' => "Escuelas de Idiomas"],
            ['name' => "Guarderías"],
            ['name' => "Empresas de Eventos"],
            ['name' => "Centros de Yoga"],
            ['name' => "Escuelas de Arte"],
            ['name' => "Talleres de Reparación Electrónica"],
            ['name' => "Tiendas de Ropa Infantil"],
            ['name' => "Tiendas de Ropa de Trabajo"],
            ['name' => "Tiendas de Productos Naturales"],
            ['name' => "Empresas de Limpieza"],
            ['name' => "Servicios de Entrega"],
            ['name' => "Centros de Atención a la Tercera Edad"],
            ['name' => "Clínicas Veterinarias"],
            ['name' => "Centros de Terapia Física"],
            ['name' => "Comida para Llevar"],
            ['name' => "Servicios de Instalación de Electrodomésticos"],
            ['name' => "Tiendas de Alimentos Orgánicos"],
            ['name' => "Servicios de Reparación de Electrodomésticos"],
        ];
        
        
        DB::table('types')->insert($types);
    }
}
