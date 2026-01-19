<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $categories = MenuCategory::where('is_active', true)
            ->with(['activeItems' => function ($query){
                $query->orderBy('order');
            }])
            ->orderBy('order')
            ->get();
        return view('menu-interactive', compact('categories'));
    }
}
