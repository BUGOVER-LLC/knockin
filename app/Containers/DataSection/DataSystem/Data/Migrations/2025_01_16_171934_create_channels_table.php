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
        Schema::create('channels', function (Blueprint $table) {
            $table->char('id', 26)->unique('channelid');
            $table->char('workspace_id', 26)->nullable()->index('workspaceidchannels');
            $table->char('creator_id', 26)->nullable()->index('creatoridchannels');
            $table->string('name')->nullable();
            $table->enum('status', ['active'])->nullable();
            $table->unsignedInteger('total_connected')->default(0);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();

            $table->primary(['id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channels');
    }
};
