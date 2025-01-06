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
        Schema::table('SharedTasks', function (Blueprint $table) {
            $table->foreign(['boardId'], 'SharedTasks___fk_board_id')->references(['boardId'])->on('Boards')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['taskId'], 'SharedTasks___fk_task_id')->references(['boardTaskId'])->on('BoardTasks')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('SharedTasks', function (Blueprint $table) {
            $table->dropForeign('SharedTasks___fk_board_id');
            $table->dropForeign('SharedTasks___fk_task_id');
        });
    }
};
