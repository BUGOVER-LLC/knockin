<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('BoardTasks', function (Blueprint $table) {
            $table->foreign(['channelId'], 'channelIdBoardTasks')->references(['channelId'])->on('Channels')->onUpdate(
                'no action'
            )->onDelete('no action');
            $table->foreign(['creatorId'], 'creatorIdBoardTasks')->references(['userId'])->on('Users')->onUpdate(
                'no action'
            )->onDelete('no action');
            $table->foreign(['stapeId'], 'stapeIdBoardTasks')->references(['boardStapeId'])->on(
                'BoardStapes'
            )->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('BoardTasks', function (Blueprint $table) {
            $table->dropForeign('channelIdBoardTasks');
            $table->dropForeign('creatorIdBoardTasks');
            $table->dropForeign('stapeIdBoardTasks');
        });
    }
};
