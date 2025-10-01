<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable(); 
            $table->string('image')->nullable();
            $table->decimal('price', 10, 2); 
            $table->boolean('in_stock')->default(true); 
            $table->foreignId('product_category_id')
                ->constrained('product_categories')
                ->onDelete('cascade'); // Foreign key to categories
            $table->foreignId('discount_id')
                ->nullable()
                ->constrained('discounts')
                ->onDelete('cascade'); // Foreign key to discount
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps(); 

            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
