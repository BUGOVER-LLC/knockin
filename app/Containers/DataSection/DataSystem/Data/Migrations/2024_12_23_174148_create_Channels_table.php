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
        Schema::create('Channels', function (Blueprint $table) {
            $table->char('channelId', 26)->unique('channelid');
            $table->char('workspaceId', 26)->nullable()->index('workspaceidchannels');
            $table->char('creatorId', 26)->nullable()->index('creatoridchannels');
            $table->string('name', 255)->nullable();
            $table->enum('status', ['active'])->nullable();
            $table->unsignedInteger('totalConnected')->default(0);
            $table->timestamp('createdAt')->nullable()->useCurrent();
            $table->timestamp('updatedAt')->nullable()->useCurrent();

            $table->primary(['channelId']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Channels');
    }
};
