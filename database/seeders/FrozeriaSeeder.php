<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Database\Seeder;

class FrozeriaSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Olahan Ayam', 'description' => 'Nugget, karage, dan sayap ayam'],
            ['name' => 'Olahan Sapi', 'description' => 'Bakso sapi, slice beef, dan patty'],
            ['name' => 'Olahan Ikan', 'description' => 'Fish roll, otak-otak, dan tempura'],
            ['name' => 'Sayuran Beku', 'description' => 'Mixed vegetable dan jagung pipil'],
            ['name' => 'Kentang Goreng', 'description' => 'Shoestring, crinkle cut, dan wedges'],
            ['name' => 'Dimsum & Siomay', 'description' => 'Aneka dimsum kukus dan goreng'],
            ['name' => 'Daging Segar', 'description' => 'Daging mentah beku tanpa bumbu'],
            ['name' => 'Bakso & Sosis', 'description' => 'Sosis bakar dan bakso serbaguna'],
            ['name' => 'Pastry & Donat', 'description' => 'Adonan puff pastry dan donat beku'],
            ['name' => 'Bumbu & Saus', 'description' => 'Saus pelengkap frozen food'],
            ['name' => 'Buah Beku', 'description' => 'Strawberry dan blueberry beku'],
            ['name' => 'Makanan Siap Saji', 'description' => 'Rice bowl dan pasta beku'],
            ['name' => 'Susu & Keju', 'description' => 'Produk dairy pendamping'],
            ['name' => 'Camilan Goreng', 'description' => 'Cireng, singkong, dan risol'],
            ['name' => 'Seafood Segar', 'description' => 'Udang dan cumi beku'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        $items = [
            ['category_id' => 1, 'name' => 'Chicken Nugget 500g', 'stock' => 50, 'unit' => 'pack', 'price' => 45000],
            ['category_id' => 1, 'name' => 'Chicken Wings Spicy', 'stock' => 15, 'unit' => 'pack', 'price' => 55000],
            ['category_id' => 2, 'name' => 'Beef Slice Teriyaki', 'stock' => 20, 'unit' => 'pack', 'price' => 85000],
            ['category_id' => 8, 'name' => 'Bakso Sapi Isi 50', 'stock' => 30, 'unit' => 'pack', 'price' => 60000],
            ['category_id' => 8, 'name' => 'Sosis Bakar Jumbo', 'stock' => 5, 'unit' => 'pcs', 'price' => 35000], 
            ['category_id' => 5, 'name' => 'Shoestring Fries 1kg', 'stock' => 40, 'unit' => 'pack', 'price' => 32000],
            ['category_id' => 4, 'name' => 'Mixed Vegetables 500g', 'stock' => 25, 'unit' => 'pack', 'price' => 18000],
            ['category_id' => 6, 'name' => 'Dimsum Ayam Mix', 'stock' => 0, 'unit' => 'box', 'price' => 42000], 
            ['category_id' => 3, 'name' => 'Fish Roll 250g', 'stock' => 18, 'unit' => 'pack', 'price' => 22000],
            ['category_id' => 9, 'name' => 'Puff Pastry Sheet', 'stock' => 8, 'unit' => 'pack', 'price' => 38000], 
            ['category_id' => 10, 'name' => 'Saus Barbeque 1kg', 'stock' => 3, 'unit' => 'pouch', 'price' => 28000], 
            ['category_id' => 7, 'name' => 'Iga Sapi Lokal 1kg', 'stock' => 7, 'unit' => 'kg', 'price' => 125000],
            ['category_id' => 11, 'name' => 'Strawberry Frozen 1kg', 'stock' => 12, 'unit' => 'pack', 'price' => 45000],
            ['category_id' => 12, 'name' => 'Bolognese Pasta 300g', 'stock' => 10, 'unit' => 'bowl', 'price' => 25000],
            ['category_id' => 13, 'name' => 'Keju Mozzarella 250g', 'stock' => 15, 'unit' => 'pack', 'price' => 35000],
            ['category_id' => 14, 'name' => 'Cireng Salju Bumbu', 'stock' => 0, 'unit' => 'pack', 'price' => 15000], 
            ['category_id' => 15, 'name' => 'Udang Vaname Frozen', 'stock' => 20, 'unit' => 'pack', 'price' => 75000],
            ['category_id' => 5, 'name' => 'Potato Wedges 500g', 'stock' => 22, 'unit' => 'pack', 'price' => 38000],
            ['category_id' => 1, 'name' => 'Chicken Karage 500g', 'stock' => 14, 'unit' => 'pack', 'price' => 48000],
            ['category_id' => 6, 'name' => 'Siomay Ikan Frozen', 'stock' => 30, 'unit' => 'pack', 'price' => 20000],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}