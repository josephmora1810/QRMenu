<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MenuCategory;
use Illuminate\Database\Seeder;

class MenuCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Combos de Parrillas',
                'slug' => 'combos-parrillas',
                'description' => 'Deliciosas combinaciones de carnes a la parrilla con guarniciones',
                'order' => 1,
            ],
            [
                'name' => 'Hamburguesas y Perros Calientes',
                'slug' => 'hamburguesas-perros',
                'description' => 'Hamburguesas artesanales y perros calientes con ingredientes premium',
                'order' => 2,
            ],
            [
                'name' => 'Pizzas',
                'slug' => 'pizzas',
                'description' => 'Pizzas artesanales con masa fresca y ingredientes de calidad',
                'order' => 3,
            ],
        ];

        foreach ($categories as $category) {
            MenuCategory::updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
