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
        Schema::create('Participants', function (Blueprint $table) {
            $table->char('participantId', 26)->primary();
            $table->char('channelId', 26)->nullable()->index('channelidparticipants');
            $table->char('userId', 26)->nullable()->index('useridparticipants');
            $table->char('roleId', 26)->nullable()->index('participants___fk_role_id');
            $table->timestamp('createdAt')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Participants');
    }
};
