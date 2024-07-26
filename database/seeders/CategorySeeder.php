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
            ['name' => "Cine"],
            ['name' => "Fotografía"],
            ['name' => "Computadoras"],
            ['name' => "Teléfonos Móviles"],
            ['name' => "Electrodomésticos"],
            ['name' => "Muebles"],
            ['name' => "Decoración del Hogar"],
            ['name' => "Fitness"],
            ['name' => "Ropa de Trabajo"],
            ['name' => "Ropa de Niños"],
            ['name' => "Accesorios de Moda"],
            ['name' => "Joyería"],
            ['name' => "Cosméticos"],
            ['name' => "Productos Naturales"],
            ['name' => "Artículos para Mascotas"],
            ['name' => "Oficinas y Papelería"],
            ['name' => "Instrumentos Musicales"],
            ['name' => "Cámaras"],
            ['name' => "Videojuegos"],
            ['name' => "Software"],
            ['name' => "Entradas para Eventos"],
            ['name' => "Cursos Online"],
            ['name' => "Entrenamiento Personal"],
            ['name' => "Repuestos de Automóviles"],
            ['name' => "Suministros de Jardinería"],
            ['name' => "Ropa de Verano"],
            ['name' => "Ropa de Invierno"],
            ['name' => "Calzado"],
            ['name' => "Bolsos"],
            ['name' => "Relojes"],
            ['name' => "Lentes de Sol"],
            ['name' => "Productos de Cocina"],
            ['name' => "Artículos para el Hogar"],
            ['name' => "Herramientas"],
            ['name' => "Material de Construcción"],
            ['name' => "Electrodomésticos de Cocina"],
            ['name' => "Suplementos Alimenticios"],
            ['name' => "Vinos y Bebidas"],
            ['name' => "Productos de Panadería"],
            ['name' => "Alimentos Gourmet"],
            ['name' => "Servicios de Belleza"],
            ['name' => "Paquetes de Vacaciones"],
            ['name' => "Escapadas de Fin de Semana"],
            ['name' => "Circuitos Turísticos"],
            ['name' => "Alquiler de Vehículos"],
            ['name' => "Tours Guiados"],
            ['name' => "Entradas para Parques Temáticos"],
            ['name' => "Restaurantes de Lujo"],
            ['name' => "Bares y Cafés"],
            ['name' => "Aplicaciones Móviles"],
            ['name' => "Accesorios para Automóviles"],
            ['name' => "Cuidado de la Piel"],
            ['name' => "Productos para el Cabello"],
            ['name' => "Material de Arte"],
            ['name' => "Decoración de Interiores"],
            ['name' => "Artículos para Eventos"],
            ['name' => "Juguetes Educativos"],
            ['name' => "Ropa Casual"],
            ['name' => "Ropa Deportiva"],
            ['name' => "Equipos de Deporte"],
            ['name' => "Equipos de Camping"],
            ['name' => "Servicios de Lavandería"],
            ['name' => "Entrenadores Personales"],
            ['name' => "Estudios de Fotografía"],
            ['name' => "Viajes en Crucero"],
            ['name' => "Alojamientos"],
            ['name' => "Estudios de Yoga"],
            ['name' => "Productos para Bebés"],
            ['name' => "Servicios de Traducción"],
            ['name' => "Asesoramiento Financiero"],
            ['name' => "Servicios de Marketing"],
            ['name' => "Software de Productividad"],
            ['name' => "Herramientas de Oficina"],
            ['name' => "Material Escolar"],
            ['name' => "Suscripciones a Revistas"],
            ['name' => "Entradas para Conciertos"],
            ['name' => "Talleres de Cocina"],
            ['name' => "Ropa de Noche"],
            ['name' => "Accesorios para el Hogar"],
            ['name' => "Vestuarios para Eventos"],
            ['name' => "Servicio de Entrega a Domicilio"],
            ['name' => "Productos de Limpieza"],
            ['name' => "Cursos de Idiomas"],
            ['name' => "Actividades Recreativas"],
            ['name' => "Artículos de Colección"],
            ['name' => "Servicios de Consultoría"],
            ['name' => "Actividades al Aire Libre"]
        ];
        
        

        DB::table('categories')->insert($categories);
    }
}
