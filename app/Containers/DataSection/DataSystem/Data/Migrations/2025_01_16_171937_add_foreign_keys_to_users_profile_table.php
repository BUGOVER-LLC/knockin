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
        Schema::table('users_profile', function (Blueprint $table) {
            $table->foreign(['user_id'], 'UsersProfile___fk_user_id')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_profile', function (Blueprint $table) {
            $table->dropForeign('UsersProfile___fk_user_id');
        });
    }
};
