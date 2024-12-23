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
        Schema::table('Channels', function (Blueprint $table) {
            $table->foreign(['creatorId'], 'creatorIdChannels')->references(['userId'])->on('Users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['workspaceId'], 'workspaceIdChannels')->references(['workspaceId'])->on('Workspaces')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Channels', function (Blueprint $table) {
            $table->dropForeign('creatorIdChannels');
            $table->dropForeign('workspaceIdChannels');
        });
    }
};
