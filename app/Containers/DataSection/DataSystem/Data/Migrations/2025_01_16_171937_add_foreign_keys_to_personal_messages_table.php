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
        Schema::table('personal_messages', function (Blueprint $table) {
            $table->foreign(['author_id'], 'authorIdPersonalMessages')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['parent_id'], 'parentIdPersonalMessages')->references(['id'])->on('personal_messages')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['participant_id'], 'participantIdPersonalMessages')->references(['id'])->on('participants')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['workspace_id'], 'workspaceIdPersonalMessages')->references(['id'])->on('workspaces')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_messages', function (Blueprint $table) {
            $table->dropForeign('authorIdPersonalMessages');
            $table->dropForeign('parentIdPersonalMessages');
            $table->dropForeign('participantIdPersonalMessages');
            $table->dropForeign('workspaceIdPersonalMessages');
        });
    }
};
