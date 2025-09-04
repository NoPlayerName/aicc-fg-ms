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
        Schema::create('tb_stock', function (Blueprint $table) {
            $table->id();
            $table->string('part_no', 50)->nullable();
            $table->string('part_name', 250)->nullable();
            $table->string('product_code', 150)->nullable();
            $table->decimal('begining_balance', 10, 2)->nullable()->default(0);
            $table->decimal('stock_in', 10, 2)->nullable()->default(0);
            $table->decimal('stock_out', 10, 2)->nullable()->default(0);
            $table->decimal('closing_balance', 10, 2)->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_stock');
    }
};
