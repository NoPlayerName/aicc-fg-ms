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
        Schema::create('tb_product', function (Blueprint $table) {
            $table->id();
            $table->string('part_no', 150)->unique()->nullable()->index();
            $table->integer('std_packing')->nullable()->default(0);
            $table->integer('min_stock')->nullable()->default(0);
            $table->integer('max_stock')->nullable()->default(0);
            $table->tinyInteger('without_pallet')->nullable()->default(0);
            $table->integer('group')->nullable()->index();
            $table->integer('begining_balance')->nullable()->default(0);
            $table->date('data_begining_balance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_product');
    }
};
