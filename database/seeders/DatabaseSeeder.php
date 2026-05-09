<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tambahkan baris ini untuk memanggil seeder buatanmu
        $this->call([
            FrozeriaSeeder::class,
        ]);
    }
}