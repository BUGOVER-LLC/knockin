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
        Schema::create('MessageReactions', function (Blueprint $table) {
            $table->char('messageReactionId', 26)->primary();
            $table->char('messageId', 26)->index('messagereaction___fk_message_id');
            $table->char('authorId', 26)->index('messagereactions___fk_user_id');
            $table->string('reaction', 100);
            $table->timestamp('updatedAt')->nullable()->useCurrent();
            $table->timestamp('createdAt')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('MessageReactions');
    }
};
