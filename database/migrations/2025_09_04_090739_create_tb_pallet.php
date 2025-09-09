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
            $table->string('pallet_no', 100)->nullable()->unique()->index();
            $table->string('pallet_type', 50)->nullable()->index();
            $table->string('name', 150)->nullable()->index();
            $table->string('color', 30)->nullable()->index();
            $table->string('customer', 50)->nullable()->index();
            $table->string('product', 150)->nullable()->index();
            $table->tinyInteger('status')->nullable()->index();
            $table->tinyInteger('is_active')->nullable()->index();
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
