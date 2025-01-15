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
        Schema::table('Messages', function (Blueprint $table) {
            $table->foreign(['authorId'], 'authorIdMessages')->references(['userId'])->on('Users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['channelId'], 'channelIdMessages')->references(['channelId'])->on('Channels')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['parentId'], 'parentIdMessages')->references(['messageId'])->on('Messages')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['workspaceId'], 'workspaceIdMessages')->references(['workspaceId'])->on('Workspaces')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Messages', function (Blueprint $table) {
            $table->dropForeign('authorIdMessages');
            $table->dropForeign('channelIdMessages');
            $table->dropForeign('parentIdMessages');
            $table->dropForeign('workspaceIdMessages');
        });
    }
};
