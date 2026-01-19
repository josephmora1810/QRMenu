<?php

namespace App\Http\Controllers;

use App\Helpers\MenuDataHelper;

class MenuController extends Controller
{
    public function index()
    {
        // Usar el Helper para obtener todos los datos
        $categories = MenuDataHelper::getCompleteMenu();

        // Agregar formattedPrice a cada item
        foreach ($categories as $category) {
            foreach ($category->activeItems as $item) {
                $item->formattedPrice = fn() => MenuDataHelper::formatPrice($item->price);
            }
        }

        return view('menu-interactive', compact('categories'));
    }
}
