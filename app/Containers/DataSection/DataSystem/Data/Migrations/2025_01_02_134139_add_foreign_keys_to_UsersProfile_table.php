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
        Schema::table('UsersProfile', function (Blueprint $table) {
            $table->foreign(['userId'], 'UsersProfile___fk_user_id')->references(['userId'])->on('Users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('UsersProfile', function (Blueprint $table) {
            $table->dropForeign('UsersProfile___fk_user_id');
        });
    }
};
