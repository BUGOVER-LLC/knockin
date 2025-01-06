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
        Schema::create('PersonalParticipants', function (Blueprint $table) {
            $table->char('personalParticipantId', 26)->primary();
            $table->char('personalId', 26)->nullable()->index('personalidpersonalparticipants');
            $table->char('participantId', 26)->nullable()->index('participantidpersonalparticipants');
            $table->timestamp('createdAt')->nullable()->useCurrent();
            $table->timestamp('updatedAt')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PersonalParticipants');
    }
};
