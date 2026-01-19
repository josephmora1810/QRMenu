<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use App\Models\MenuCategory;
use Illuminate\Database\Seeder;

class MenuItemsSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener categorías
        $parrillas = MenuCategory::where('slug', 'combos-parrillas')->first();
        $hamburguesas = MenuCategory::where('slug', 'hamburguesas-perros')->first();
        $pizzas = MenuCategory::where('slug', 'pizzas')->first();

        // Combos de Parrillas (10 items)
        $parrillasItems = [
            [
                'name' => 'Combo Parrillero Familiar',
                'slug' => 'combo-parrillero-familiar',
                'description' => 'Completo combo familiar para compartir',
                'ingredients' => '500g de lomo de res, 400g de costillas de cerdo, 300g de pechuga de pollo, chorizos criollos, arepas, yuca frita',
                'price' => 42.99,
                'image_url' => 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=400&h=300&fit=crop',
                'calories' => 1800,
                'preparation_time' => 35,
            ],
            [
                'name' => 'Combo Carnes Mixtas',
                'slug' => 'combo-carnes-mixtas',
                'description' => 'Selección de las mejores carnes',
                'ingredients' => '300g de picanha, 250g de chorizo argentino, 200g de pollo marinado, papas a la francesa, ensalada verde',
                'price' => 28.50,
                'image_url' => 'https://images.unsplash.com/photo-1544025162-d76694265947?w=400&h=300&fit=crop',
                'calories' => 1250,
                'preparation_time' => 30,
            ],
            [
                'name' => 'Combo BBQ Especial',
                'slug' => 'combo-bbq-especial',
                'description' => 'Sabor ahumado con nuestra salsa secreta BBQ',
                'ingredients' => '400g de costillas BBQ, 300g de pechuga de pollo, maíz tierno, papa horneada, ensalada de col',
                'price' => 32.75,
                'image_url' => 'https://images.unsplash.com/photo-1529193591184-b1d58069ecdd?w=400&h=300&fit=crop',
                'calories' => 1400,
                'preparation_time' => 40,
            ],
            [
                'name' => 'Combo Parrilla Argentina',
                'slug' => 'combo-parrilla-argentina',
                'description' => 'Auténtico sabor argentino',
                'ingredients' => '450g de asado de tira, 300g de morcilla, 200g de mollejas, provoleta, chimichurri',
                'price' => 36.80,
                'image_url' => 'https://images.unsplash.com/photo-1558030006-450675393462?w=400&h=300&fit=crop',
                'calories' => 1600,
                'preparation_time' => 45,
            ],
            [
                'name' => 'Combo Parrilla Light',
                'slug' => 'combo-parrilla-light',
                'description' => 'Opción más saludable sin sacrificar sabor',
                'ingredients' => '300g de lomo de res magro, 250g de pollo a la plancha, vegetales grillados, quinoa',
                'price' => 24.90,
                'image_url' => 'https://images.unsplash.com/photo-1551024506-0bccd828d307?w=400&h=300&fit=crop',
                'calories' => 850,
                'preparation_time' => 25,
            ],
            [
                'name' => 'Combo Mar y Tierra',
                'slug' => 'combo-mar-y-tierra',
                'description' => 'La combinación perfecta de carnes y mariscos',
                'ingredients' => '250g de lomo de res, 200g de camarones grillados, 150g de calamares, arroz con coco, patacones',
                'price' => 38.50,
                'image_url' => 'https://images.unsplash.com/photo-1600891964092-4316c288032e?w=400&h=300&fit=crop',
                'calories' => 1350,
                'preparation_time' => 35,
            ],
            [
                'name' => 'Combo Parrilla Express',
                'slug' => 'combo-parrilla-express',
                'description' => 'Perfecto para cuando tienes prisa',
                'ingredients' => '350g de carne de res, 200g de chorizo, arepas, papas fritas',
                'price' => 19.99,
                'image_url' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=400&h=300&fit=crop',
                'calories' => 1100,
                'preparation_time' => 20,
            ],
            [
                'name' => 'Combo Parrilla Premium',
                'slug' => 'combo-parrilla-premium',
                'description' => 'Nuestra selección más exclusiva',
                'ingredients' => '500g de wagyu, 300g de langosta, espárragos grillados, puré de trufa',
                'price' => 89.99,
                'image_url' => 'https://images.unsplash.com/photo-1546833999-b9f581a1996d?w=400&h=300&fit=crop',
                'calories' => 1650,
                'preparation_time' => 50,
            ],
            [
                'name' => 'Combo Parrilla Vegana',
                'slug' => 'combo-parrilla-vegana',
                'description' => 'Deliciosas opciones vegetarianas a la parrilla',
                'ingredients' => 'Hamburguesa de lentejas, chorizo vegetal, brochetas de verduras, quinoa, ensalada',
                'price' => 22.50,
                'image_url' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=400&h=300&fit=crop',
                'calories' => 750,
                'preparation_time' => 25,
            ],
            [
                'name' => 'Combo Parrilla Mexicana',
                'slug' => 'combo-parrilla-mexicana',
                'description' => 'Con el toque picante mexicano',
                'ingredients' => '400g de carne adobada, 300g de pollo con chipotle, guacamole, frijoles, tortillas',
                'price' => 29.75,
                'image_url' => 'https://images.unsplash.com/photo-1565299585323-38d6b0865b47?w=400&h=300&fit=crop',
                'calories' => 1450,
                'preparation_time' => 30,
            ],
        ];

        // Hamburguesas y Perros Calientes (10 items)
        $hamburguesasItems = [
            [
                'name' => 'Hamburguesa Clásica',
                'slug' => 'hamburguesa-clasica',
                'description' => 'La hamburguesa que nunca falla',
                'ingredients' => 'Carne 150g, lechuga, tomate, cebolla, queso americano, salsa especial, pan brioche',
                'price' => 12.99,
                'image_url' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=400&h=300&fit=crop',
                'calories' => 850,
                'preparation_time' => 15,
            ],
            [
                'name' => 'Hamburguesa BBQ',
                'slug' => 'hamburguesa-bbq',
                'description' => 'Con nuestra salsa BBQ casera',
                'ingredients' => 'Doble carne 300g, queso cheddar, cebolla crispy, tocino, salsa BBQ, pan de papa',
                'price' => 16.50,
                'image_url' => 'https://images.unsplash.com/photo-1553979459-d2229ba7433d?w=400&h=300&fit=crop',
                'calories' => 1200,
                'preparation_time' => 20,
            ],
            [
                'name' => 'Hamburguesa Vegana',
                'slug' => 'hamburguesa-vegana',
                'description' => 'Deliciosa opción vegetariana',
                'ingredients' => 'Medallón de garbanzos, lechuga, tomate, cebolla morada, aguacate, mayonesa vegana',
                'price' => 14.25,
                'image_url' => 'https://images.unsplash.com/photo-1559314809-2b99056a8c4a?w=400&h=300&fit=crop',
                'calories' => 650,
                'preparation_time' => 18,
            ],
            [
                'name' => 'Hamburguesa Hawaiana',
                'slug' => 'hamburguesa-hawaiana',
                'description' => 'Dulce y salada al estilo hawaiano',
                'ingredients' => 'Carne de cerdo, piña grillada, queso suizo, jamón, salsa teriyaki',
                'price' => 15.75,
                'image_url' => 'https://images.unsplash.com/photo-1594212699903-ec8a3eca50f5?w=400&h=300&fit=crop',
                'calories' => 950,
                'preparation_time' => 22,
            ],
            [
                'name' => 'Perro Caliente Clásico',
                'slug' => 'perro-caliente-clasico',
                'description' => 'El tradicional que todos aman',
                'ingredients' => 'Salchicha vienesa, cebolla picada, papas, repollo, queso guayanés, salsas',
                'price' => 8.50,
                'image_url' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=400&h=300&fit=crop',
                'calories' => 700,
                'preparation_time' => 10,
            ],
            [
                'name' => 'Perro Caliente Mexicano',
                'slug' => 'perro-caliente-mexicano',
                'description' => 'Con el toque picante mexicano',
                'ingredients' => 'Salchicha jalapeño, guacamole, pico de gallo, nachos, queso derretido',
                'price' => 10.99,
                'image_url' => 'https://images.unsplash.com/photo-1547584370-2e0343a7c3c9?w=400&h=300&fit=crop',
                'calories' => 850,
                'preparation_time' => 12,
            ],
            [
                'name' => 'Perro Caliente Chicago',
                'slug' => 'perro-caliente-chicago',
                'description' => 'Estilo Chicago auténtico',
                'ingredients' => 'Salchicha de res, tomate en cubos, pepinillos, mostaza, cebolla, apio sal',
                'price' => 11.25,
                'image_url' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?w=400&h=300&fit=crop',
                'calories' => 800,
                'preparation_time' => 15,
            ],
            [
                'name' => 'Hamburguesa Doble Queso',
                'slug' => 'hamburguesa-doble-queso',
                'description' => 'Para los amantes del queso',
                'ingredients' => 'Doble carne, doble queso cheddar, cebolla caramelizada, tocino extra crujiente',
                'price' => 18.99,
                'image_url' => 'https://images.unsplash.com/photo-1603064752734-4c48eff53d05?w=400&h=300&fit=crop',
                'calories' => 1350,
                'preparation_time' => 25,
            ],
            [
                'name' => 'Perro Caliente Hawái',
                'slug' => 'perro-caliente-hawai',
                'description' => 'Con sabores tropicales',
                'ingredients' => 'Salchicha de pollo, piña, salsa agridulce, cebolla morada, cilantro',
                'price' => 9.75,
                'image_url' => 'https://images.unsplash.com/photo-1565299507177-b0ac66763828?w=400&h=300&fit=crop',
                'calories' => 750,
                'preparation_time' => 12,
            ],
            [
                'name' => 'Hamburguesa Picante',
                'slug' => 'hamburguesa-picante',
                'description' => 'Para valientes amantes del picante',
                'ingredients' => 'Carne 200g, queso pepper jack, jalapeños, salsa habanero, cebolla morada',
                'price' => 17.50,
                'image_url' => 'https://images.unsplash.com/photo-1572802419224-296b0aeee0d9?w=400&h=300&fit=crop',
                'calories' => 1100,
                'preparation_time' => 20,
            ],
        ];

        // Pizzas (10 items)
        $pizzasItems = [
            [
                'name' => 'Pizza Margherita',
                'slug' => 'pizza-margherita',
                'description' => 'La clásica italiana',
                'ingredients' => 'Salsa de tomate, mozzarella fresca, albahaca, aceite de oliva',
                'price' => 16.99,
                'image_url' => 'https://images.unsplash.com/photo-1574071318508-1cdbab80d002?w=400&h=300&fit=crop',
                'calories' => 850,
                'preparation_time' => 25,
            ],
            [
                'name' => 'Pizza Pepperoni',
                'slug' => 'pizza-pepperoni',
                'description' => 'La favorita de todos',
                'ingredients' => 'Salsa de tomate, mozzarella, pepperoni, orégano',
                'price' => 18.50,
                'image_url' => 'https://images.unsplash.com/photo-1628840042765-356cda07504e?w=400&h=300&fit=crop',
                'calories' => 950,
                'preparation_time' => 22,
            ],
            [
                'name' => 'Pizza Hawaiana',
                'slug' => 'pizza-hawaiana',
                'description' => 'Dulce y salada',
                'ingredients' => 'Salsa de tomate, mozzarella, jamón, piña',
                'price' => 19.75,
                'image_url' => 'https://images.unsplash.com/photo-1604068549290-dea0e4a305ca?w=400&h=300&fit=crop',
                'calories' => 900,
                'preparation_time' => 24,
            ],
            [
                'name' => 'Pizza Cuatro Quesos',
                'slug' => 'pizza-cuatro-quesos',
                'description' => 'Para amantes del queso',
                'ingredients' => 'Mozzarella, gorgonzola, parmesano, fontina, salsa blanca',
                'price' => 21.99,
                'image_url' => 'https://images.unsplash.com/photo-1593246049226-ded77bf90326?w=400&h=300&fit=crop',
                'calories' => 1100,
                'preparation_time' => 28,
            ],
            [
                'name' => 'Pizza Vegetariana',
                'slug' => 'pizza-vegetariana',
                'description' => 'Llena de vegetales frescos',
                'ingredients' => 'Pimientos, cebolla, champiñones, aceitunas, tomate, mozzarella',
                'price' => 20.50,
                'image_url' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?w=400&h=300&fit=crop',
                'calories' => 800,
                'preparation_time' => 26,
            ],
            [
                'name' => 'Pizza Carnívora',
                'slug' => 'pizza-carnivora',
                'description' => 'Carnes por todas partes',
                'ingredients' => 'Pepperoni, salchicha italiana, jamón, tocino, carne molida, mozzarella',
                'price' => 24.99,
                'image_url' => 'https://images.unsplash.com/photo-1601924582970-9238bcb495d9?w=400&h=300&fit=crop',
                'calories' => 1300,
                'preparation_time' => 30,
            ],
            [
                'name' => 'Pizza BBQ Chicken',
                'slug' => 'pizza-bbq-chicken',
                'description' => 'Pollo con salsa BBQ',
                'ingredients' => 'Pollo a la BBQ, cebolla morada, cilantro, mozzarella, salsa BBQ',
                'price' => 22.75,
                'image_url' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?w=400&h=300&fit=crop',
                'calories' => 1050,
                'preparation_time' => 27,
            ],
            [
                'name' => 'Pizza Mexicana',
                'slug' => 'pizza-mexicana',
                'description' => 'Con sabores mexicanos',
                'ingredients' => 'Carne molida, jalapeños, frijoles, maíz, pico de gallo, queso blend',
                'price' => 23.50,
                'image_url' => 'https://images.unsplash.com/photo-1595708684082-a173bb3a06c5?w=400&h=300&fit=crop',
                'calories' => 1150,
                'preparation_time' => 29,
            ],
            [
                'name' => 'Pizza Supreme',
                'slug' => 'pizza-supreme',
                'description' => 'La pizza completa',
                'ingredients' => 'Pepperoni, salchicha, champiñones, pimientos, cebolla, aceitunas',
                'price' => 25.99,
                'image_url' => 'https://images.unsplash.com/photo-1542282811-943ef1a977c3?w=400&h=300&fit=crop',
                'calories' => 1250,
                'preparation_time' => 32,
            ],
            [
                'name' => 'Pizza Trufa',
                'slug' => 'pizza-trufa',
                'description' => 'Delicada con aceite de trufa',
                'ingredients' => 'Mozzarella di bufala, champiñones portobello, rúcula, aceite de trufa, parmesano',
                'price' => 29.99,
                'image_url' => 'https://images.unsplash.com/photo-1595854341625-f33ee10dbf94?w=400&h=300&fit=crop',
                'calories' => 950,
                'preparation_time' => 35,
            ],
        ];

        // Insertar los items
        $order = 1;
        foreach ($parrillasItems as $item) {
            $item['category_id'] = $parrillas->id;
            $item['order'] = $order++;
            MenuItem::updateOrCreate(['slug' => $item['slug']], $item);
            $this->command->info('Created menu item: ' . $item['name']);
        }

        $order = 1;
        foreach ($hamburguesasItems as $item) {
            $item['category_id'] = $hamburguesas->id;
            $item['order'] = $order++;
            MenuItem::updateOrCreate(['slug' => $item['slug']], $item);
            $this->command->info('Created menu item: ' . $item['name']);
        }

        $order = 1;
        foreach ($pizzasItems as $item) {
            $item['category_id'] = $pizzas->id;
            $item['order'] = $order++;
            MenuItem::updateOrCreate(['slug' => $item['slug']], $item);
            $this->command->info('Created menu item: ' . $item['name']);
        }

    $this->command->info('Total: ' . MenuItem::count() . ' menu items seeded.');

    }
}
