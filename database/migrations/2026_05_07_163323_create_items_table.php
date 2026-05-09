<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
                ->onDelete('set null');

            $table->integer('stock');
            $table->string('unit'); // 
            $table->integer('stock_min')->default(10);
            $table->decimal('price', 10, 2);
            $table->decimal('price_buy', 10, 2)->nullable();
            $table->string('weight')->nullable();
            $table->string('location')->nullable(); 
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }
};
