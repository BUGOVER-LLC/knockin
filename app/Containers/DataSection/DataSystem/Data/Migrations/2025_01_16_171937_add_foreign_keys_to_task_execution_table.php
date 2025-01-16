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
        Schema::table('task_execution', function (Blueprint $table) {
            $table->foreign(['executor_id'], 'TaskExecution___fk_executir_id')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['task_id'], 'TaskExecution___fk_task_id')->references(['id'])->on('board_tasks')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('task_execution', function (Blueprint $table) {
            $table->dropForeign('TaskExecution___fk_executir_id');
            $table->dropForeign('TaskExecution___fk_task_id');
        });
    }
};
