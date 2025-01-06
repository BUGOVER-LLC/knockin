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
        Schema::table('PersonalParticipants', function (Blueprint $table) {
            $table->foreign(['participantId'], 'participantIdPersonalParticipants')->references(['participantId'])->on('Participants')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['personalId'], 'personalIdPersonalParticipants')->references(['personalMessageId'])->on('PersonalMessages')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('PersonalParticipants', function (Blueprint $table) {
            $table->dropForeign('participantIdPersonalParticipants');
            $table->dropForeign('personalIdPersonalParticipants');
        });
    }
};
