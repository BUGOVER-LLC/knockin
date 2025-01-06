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
        Schema::table('MessageViewer', function (Blueprint $table) {
            $table->foreign(['messageId'], 'MessageViewer_Messages_messageId_fk')->references(['messageId'])->on('Messages')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['viewerId'], 'MessageViewer_Users_userId_fk')->references(['userId'])->on('Users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('MessageViewer', function (Blueprint $table) {
            $table->dropForeign('MessageViewer_Messages_messageId_fk');
            $table->dropForeign('MessageViewer_Users_userId_fk');
        });
    }
};
