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
        Schema::table('shared_channels', function (Blueprint $table) {
            $table->foreign(['channel_id'], 'SharedChannels___fk_channel_id')->references(['id'])->on('channels')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['workspace_id'], 'SharedChannels___fk_workspace_id')->references(['id'])->on('workspaces')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shared_channels', function (Blueprint $table) {
            $table->dropForeign('SharedChannels___fk_channel_id');
            $table->dropForeign('SharedChannels___fk_workspace_id');
        });
    }
};
