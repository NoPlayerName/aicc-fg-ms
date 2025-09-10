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
        Schema::create('tb_transaction', function (Blueprint $table) {
            $table->id();
            $table->string('pallet_no', 100)->nullable()->index();
            $table->string('location', 150)->nullable();
            $table->string('product', 150)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();

            // $table->foreign('pallet_no')->references('pallet_no')->on('tb_pallet')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_transaction');
    }
};
