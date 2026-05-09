<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Field yang boleh diisi melalui mass assignment
    protected $fillable = ['name', 'description'];

    // Relasi satu kategori punya banyak item
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}