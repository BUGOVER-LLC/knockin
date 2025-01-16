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
        Schema::table('personal_participants', function (Blueprint $table) {
            $table->foreign(['participant_id'], 'participantIdPersonalParticipants')->references(['id'])->on('participants')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['personal_id'], 'personalIdPersonalParticipants')->references(['id'])->on('personal_messages')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_participants', function (Blueprint $table) {
            $table->dropForeign('participantIdPersonalParticipants');
            $table->dropForeign('personalIdPersonalParticipants');
        });
    }
};
