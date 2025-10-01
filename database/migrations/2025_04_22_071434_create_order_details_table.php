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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->decimal('total_amount', 10, 2);
            $table->foreignId('payment_method_id')->constrained('payment_details')->onDelete('cascade');
            $table->foreignId('delivery_id')->constrained('delivery_methods')->onDelete('cascade');
            // $table->foreignId('cart_id')->constrained('cart_items')->onDelete('cascade');
            $table->string('delivery_date')->nullable();
            $table->string('phone_number')->nullable(); // Make nullable
            $table->string('address')->nullable();
            $table->enum('status', ['Pending', 'Success', 'Failed', 'Refunded', 'Canceled'])->default('Pending')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};