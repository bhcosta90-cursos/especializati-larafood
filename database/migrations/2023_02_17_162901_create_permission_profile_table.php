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
        Schema::create('permission_profile', function (Blueprint $table) {
            $table->foreignUuid('permission_id')->on('permissions');
            $table->foreignUuid('profile_id')->on('profiles');

            $table->primary(['permission_id', 'profile_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_profile');
    }
};
