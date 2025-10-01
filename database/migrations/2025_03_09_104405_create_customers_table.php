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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('user_avatar')->nullable();
            $table->string('username')->nullable();
            $table->string('phone_number')->nullable()->unique(); // Make nullable
            $table->string('email')->nullable()->unique(); // Make nullable
            $table->string('address')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('created_by')->nullable();

            $table->foreignId('gender_id')->nullable()
                ->constrained('genders')
                ->onDelete('cascade');

            $table->foreignId('province_id')
                ->constrained('provinces')
                ->onDelete('cascade');

            $table->timestamps(); 

            // $table->foreign('created_by')
            //     ->references('id')
            //     ->on('users')
            //     ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
