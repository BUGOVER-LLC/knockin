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
        Schema::table('board_tasks', function (Blueprint $table) {
            $table->foreign(['channel_id'], 'channelIdBoardTasks')->references(['id'])->on('channels')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['creator_id'], 'creatorIdBoardTasks')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['stape_id'], 'stapeIdBoardTasks')->references(['id'])->on('board_stapes')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('board_tasks', function (Blueprint $table) {
            $table->dropForeign('channelIdBoardTasks');
            $table->dropForeign('creatorIdBoardTasks');
            $table->dropForeign('stapeIdBoardTasks');
        });
    }
};
