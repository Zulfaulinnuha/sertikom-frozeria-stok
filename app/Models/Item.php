<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'category_id', 
        'unit',       
        'stock', 
        'stock_min', 
        'price', 
        'price_buy', 
        'weight', 
        'location',    
        'description', 
        'photo'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}