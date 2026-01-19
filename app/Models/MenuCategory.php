<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;


class MenuCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'order',
        'is_active'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'category_id')->orderBy('order');
    }

    public function activeItems(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'category_id')
                    ->where('is_available', true)
                    ->orderBy('order');
    }
}
