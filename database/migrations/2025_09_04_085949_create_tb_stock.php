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
            $table->string('part_no', 50)->nullable()->index();
            $table->string('part_name', 250)->nullable()->index();
            $table->string('product_code', 150)->nullable()->index();
            $table->decimal('begining_balance', 10, 2)->nullable()->default(0);
            $table->decimal('stock_in', 10, 2)->nullable()->default(0);
            $table->decimal('stock_out', 10, 2)->nullable()->default(0);
            $table->decimal('closing_balance', 10, 2)->nullable()->default(0);
            $table->string('created_by', 50)->nullable();
            $table->timestamp('last_generated_at')->nullable();
            $table->timestamp('periode_start')->nullable();
            $table->timestamp('periode_end')->nullable();
            $table->timestamps();
            $table->unique(['part_no', 'created_by'], 'unique_part_no');
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
