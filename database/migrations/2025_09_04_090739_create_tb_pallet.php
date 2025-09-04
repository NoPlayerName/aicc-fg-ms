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
        Schema::create('tb_pallet', function (Blueprint $table) {
            $table->id();
            $table->integer('pallet')->nullable();
            $table->string('pallet_type', 50)->nullable();
            $table->string('name', 150)->nullable();
            $table->string('color', 30)->nullable();
            $table->string('customer', 50)->nullable();
            $table->string('product', 150)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('is_active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pallet');
    }
};
