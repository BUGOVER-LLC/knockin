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
        Schema::table('TaskExecution', function (Blueprint $table) {
            $table->foreign(['executorId'], 'TaskExecution___fk_executir_id')->references(['userId'])->on('Users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['taskId'], 'TaskExecution___fk_task_id')->references(['boardTaskId'])->on('BoardTasks')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('TaskExecution', function (Blueprint $table) {
            $table->dropForeign('TaskExecution___fk_executir_id');
            $table->dropForeign('TaskExecution___fk_task_id');
        });
    }
};
