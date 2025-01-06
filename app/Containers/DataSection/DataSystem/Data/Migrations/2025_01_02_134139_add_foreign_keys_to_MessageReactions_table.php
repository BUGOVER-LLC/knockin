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
        Schema::table('MessageReactions', function (Blueprint $table) {
            $table->foreign(['messageId'], 'MessageReaction___fk_message_id')->references(['messageId'])->on('Messages')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['authorId'], 'MessageReactions___fk_user_id')->references(['userId'])->on('Users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('MessageReactions', function (Blueprint $table) {
            $table->dropForeign('MessageReaction___fk_message_id');
            $table->dropForeign('MessageReactions___fk_user_id');
        });
    }
};
