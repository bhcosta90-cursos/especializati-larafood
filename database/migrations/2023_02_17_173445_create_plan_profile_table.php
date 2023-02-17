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
        Schema::create('plan_profile', function (Blueprint $table) {
            $table->foreignUuid('plan_id')->on('plans');
            $table->foreignUuid('profile_id')->on('profiles');

            $table->primary(['plan_id', 'profile_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_profile');
    }
};
