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
        Schema::table('participants', function (Blueprint $table) {
            $table->foreign(['channel_id'], 'channelIdParticipants')->references(['id'])->on('channels')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['role_id'], 'Participants___fk_role_id')->references(['id'])->on('roles')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['user_id'], 'userIdParticipants')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->dropForeign('channelIdParticipants');
            $table->dropForeign('Participants___fk_role_id');
            $table->dropForeign('userIdParticipants');
        });
    }
};
