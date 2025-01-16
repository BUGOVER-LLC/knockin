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
        Schema::table('channels', function (Blueprint $table) {
            $table->foreign(['creator_id'], 'creatorIdChannels')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['workspace_id'], 'workspaceIdChannels')->references(['id'])->on('workspaces')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('channels', function (Blueprint $table) {
            $table->dropForeign('creatorIdChannels');
            $table->dropForeign('workspaceIdChannels');
        });
    }
};
