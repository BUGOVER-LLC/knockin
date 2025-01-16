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
        Schema::table('message_reactions', function (Blueprint $table) {
            $table->foreign(['message_id'], 'MessageReaction___fk_message_id')->references(['id'])->on('messages')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['author_id'], 'MessageReactions___fk_user_id')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('message_reactions', function (Blueprint $table) {
            $table->dropForeign('MessageReaction___fk_message_id');
            $table->dropForeign('MessageReactions___fk_user_id');
        });
    }
};
