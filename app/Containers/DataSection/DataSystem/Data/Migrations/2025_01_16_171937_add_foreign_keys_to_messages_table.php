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
        Schema::table('messages', function (Blueprint $table) {
            $table->foreign(['author_id'], 'authorIdMessages')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['channel_id'], 'channelIdMessages')->references(['id'])->on('channels')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['parent_id'], 'parentIdMessages')->references(['id'])->on('messages')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['workspace_id'], 'workspaceIdMessages')->references(['id'])->on('workspaces')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign('authorIdMessages');
            $table->dropForeign('channelIdMessages');
            $table->dropForeign('parentIdMessages');
            $table->dropForeign('workspaceIdMessages');
        });
    }
};
