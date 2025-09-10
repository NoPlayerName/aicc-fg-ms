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
        Schema::create('tb_stock_out', function (Blueprint $table) {
            $table->id();
            $table->string('part_no', 50)->nullable()->index();
            $table->string('part_name', 250)->nullable();
            $table->string('pallet_no', 100)->nullable()->index();
            $table->decimal('qty', 10, 2)->nullable();
            $table->string('rack_no', 10)->nullable()->index();
            $table->tinyInteger('status')->nullable();
            $table->string('customer', 250)->nullable();
            $table->string('desc', 150)->nullable();
            $table->string('created_by', 50)->nullable();
            $table->timestamps();

            // $table->foreign('pallet_no')->references('pallet_no')->on('tb_pallet')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_stock_out');
    }
};
