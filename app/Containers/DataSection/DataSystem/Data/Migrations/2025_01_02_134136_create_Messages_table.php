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
        Schema::create('Messages', function (Blueprint $table) {
            $table->char('messageId', 26)->primary();
            $table->char('workspaceId', 26)->nullable()->index('workspaceidmessages');
            $table->char('channelId', 26)->nullable()->index('channelidmessages');
            $table->char('authorId', 26)->nullable()->index('authoridmessages');
            $table->char('parentId', 26)->nullable()->index('parentidmessages');
            $table->json('body')->nullable();
            $table->enum('type', [''])->nullable();
            $table->dateTime('viewedAt')->nullable();
            $table->timestamp('createdAt')->nullable()->useCurrent();
            $table->timestamp('updatedAt')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Messages');
    }
};
