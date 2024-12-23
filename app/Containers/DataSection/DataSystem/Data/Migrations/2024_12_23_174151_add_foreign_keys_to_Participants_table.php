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
        Schema::table('Participants', function (Blueprint $table) {
            $table->foreign(['channelId'], 'channelIdParticipants')->references(['channelId'])->on('Channels')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['userId'], 'userIdParticipants')->references(['userId'])->on('Users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Participants', function (Blueprint $table) {
            $table->dropForeign('channelIdParticipants');
            $table->dropForeign('userIdParticipants');
        });
    }
};
