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
        Schema::table('PersonalMessages', function (Blueprint $table) {
            $table->foreign(['authorId'], 'authorIdPersonalMessages')->references(['userId'])->on('Users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['parentId'], 'parentIdPersonalMessages')->references(['personalMessageId'])->on('PersonalMessages')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['participantId'], 'participantIdPersonalMessages')->references(['participantId'])->on('Participants')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['workspaceId'], 'workspaceIdPersonalMessages')->references(['workspaceId'])->on('Workspaces')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('PersonalMessages', function (Blueprint $table) {
            $table->dropForeign('authorIdPersonalMessages');
            $table->dropForeign('parentIdPersonalMessages');
            $table->dropForeign('participantIdPersonalMessages');
            $table->dropForeign('workspaceIdPersonalMessages');
        });
    }
};
