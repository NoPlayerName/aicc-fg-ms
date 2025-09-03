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
        Schema::create('tb_rack', function (Blueprint $table) {
            $table->id();
            $table->string('rack_no', 5)->unique()->nullable()->index();
            $table->string('part_no', 50)->nullable()->default(null)->index();
            $table->string('product_code', 250)->nullable()->default(null);
            $table->tinyInteger('status')->nullable()->default(null)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_rack');
    }
};
