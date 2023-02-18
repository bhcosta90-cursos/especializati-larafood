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
        Schema::create('companies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('plan_id')->on('plans');
            $table->string('cnpj')->unique();
            $table->string('name')->unique();
            $table->string('url')->unique();
            $table->string('email')->unique();
            $table->string('logo')->nullable();

            $table->enum('active', ['Y', 'N'])->default('Y')->comment('Status tenant (se inativar \'N\' ele perde o acesso ao sistema)');

            // Subscription
            $table->date('subscription')->nullable()->comment('Data que se inscreveu');
            $table->date('expires_at')->nullable()->comment('Data que expira o acesso');
            $table->string('subscription_id', 255)->nullable()->comment('Identificado do Gateway de pagamento');
            $table->boolean('subscription_active')->default(false)->comment('Assinatura ativa (porque pode cancelar)');
            $table->boolean('subscription_suspended')->default(false)->comment('Assinatura cancelada');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
