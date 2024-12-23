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
        Schema::table('SharedChannels', function (Blueprint $table) {
            $table->foreign(['channelId'], 'SharedChannels___fk_channel_id')->references(['channelId'])->on('Channels')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['workspaceId'], 'SharedChannels___fk_workspace_id')->references(['workspaceId'])->on('Workspaces')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('SharedChannels', function (Blueprint $table) {
            $table->dropForeign('SharedChannels___fk_channel_id');
            $table->dropForeign('SharedChannels___fk_workspace_id');
        });
    }
};
