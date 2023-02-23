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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('identify')->index();
            $table->foreignUuid('company_id')->on('companies');
            $table->foreignUuid('customer_id')->nullable()->on('customers');
            $table->foreignUuid('table_id')->nullable()->on('tables');
            $table->double('total', 15, 2);
            $table->enum('status', ['open', 'done', 'rejected', 'working', 'canceled', 'delivering']);
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
        Schema::dropIfExists('orders');
    }
};
