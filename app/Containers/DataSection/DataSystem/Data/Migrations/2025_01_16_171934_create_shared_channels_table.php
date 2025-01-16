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
        Schema::create('shared_channels', function (Blueprint $table) {
            $table->char('id', 26)->primary();
            $table->char('channel_id', 26)->nullable()->index('sharedchannels___fk_channel_id');
            $table->char('workspace_id', 26)->nullable()->index('sharedchannels___fk_workspace_id');
            $table->char('target_id', 26)->nullable();
            $table->string('name');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shared_channels');
    }
};
