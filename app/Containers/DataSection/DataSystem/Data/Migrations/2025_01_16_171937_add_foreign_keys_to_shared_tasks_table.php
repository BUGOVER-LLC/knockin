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
        Schema::table('shared_tasks', function (Blueprint $table) {
            $table->foreign(['board_id'], 'SharedTasks___fk_board_id')->references(['id'])->on('boards')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['task_id'], 'SharedTasks___fk_task_id')->references(['id'])->on('board_tasks')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shared_tasks', function (Blueprint $table) {
            $table->dropForeign('SharedTasks___fk_board_id');
            $table->dropForeign('SharedTasks___fk_task_id');
        });
    }
};
