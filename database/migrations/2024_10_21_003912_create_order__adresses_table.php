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
        Schema::create('order_adresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')
            ->constrained('orders')->cascadeOnDelete();
            $table->enum('type',['billing','shipping']);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mail');
            $table->string('phone')->nullable();
            $table->string('city');
            $table->string('country',2);
            $table->string('postal_code')->nullable();
            $table->string('state')->nullable();
            $table->text('street_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_adresses');
    }
};
