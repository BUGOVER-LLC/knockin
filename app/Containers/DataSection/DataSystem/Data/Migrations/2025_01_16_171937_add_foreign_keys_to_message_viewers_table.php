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
        Schema::table('message_viewers', function (Blueprint $table) {
            $table->foreign(['message_id'], 'MessageViewer_Messages_messageId_fk')->references(['id'])->on('messages')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['viewer_id'], 'MessageViewer_Users_userId_fk')->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('message_viewers', function (Blueprint $table) {
            $table->dropForeign('MessageViewer_Messages_messageId_fk');
            $table->dropForeign('MessageViewer_Users_userId_fk');
        });
    }
};
