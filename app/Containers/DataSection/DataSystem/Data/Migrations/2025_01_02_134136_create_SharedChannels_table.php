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
        Schema::create('SharedChannels', function (Blueprint $table) {
            $table->char('sharedChannelId', 26)->primary();
            $table->char('channelId', 26)->nullable()->index('sharedchannels___fk_channel_id');
            $table->char('workspaceId', 26)->nullable()->index('sharedchannels___fk_workspace_id');
            $table->char('targetId', 26)->nullable();
            $table->string('name');
            $table->timestamp('createdAt')->nullable()->useCurrent();
            $table->timestamp('updatedAt')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SharedChannels');
    }
};
