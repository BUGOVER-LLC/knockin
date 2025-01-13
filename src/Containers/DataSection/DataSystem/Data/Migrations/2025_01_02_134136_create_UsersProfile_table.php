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
        Schema::create('UsersProfile', function (Blueprint $table) {
            $table->char('userProfileId', 26)->primary();
            $table->char('userId', 26)->nullable()->index('usersprofile___fk_user_id');
            $table->string('fullName')->nullable();
            $table->string('viewedName')->nullable();
            $table->json('photo')->nullable();
            $table->string('role', 100)->nullable();
            $table->string('timeZone')->nullable();
            $table->timestamp('createdAt')->nullable()->useCurrent();
            $table->timestamp('updatedAt')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('UsersProfile');
    }
};
