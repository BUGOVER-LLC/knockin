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
        Schema::create('messages', function (Blueprint $table) {
            $table->char('id', 26)->primary();
            $table->char('workspace_id', 26)->nullable()->index('workspaceidmessages');
            $table->char('channel_id', 26)->nullable()->index('channelidmessages');
            $table->char('author_id', 26)->nullable()->index('authoridmessages');
            $table->char('parent_id', 26)->nullable()->index('parentidmessages');
            $table->json('body')->nullable();
            $table->enum('type', [''])->nullable();
            $table->dateTime('viewed_at')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
