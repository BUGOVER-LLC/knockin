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
        Schema::create('participants', function (Blueprint $table) {
            $table->char('id', 26)->primary();
            $table->char('channel_id', 26)->nullable()->index('channelidparticipants');
            $table->char('user_id', 26)->nullable()->index('useridparticipants');
            $table->char('role_id', 26)->nullable()->index('participants___fk_role_id');
            $table->timestamp('created_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
