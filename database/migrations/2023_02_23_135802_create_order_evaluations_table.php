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
        Schema::create('order_evaluations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('order_id')->on('orders');
            $table->foreignUuid('customer_id')->on('customer');
            $table->enum('stars', [0, 1, 2, 3, 4, 5]);
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_evaluations');
    }
};
