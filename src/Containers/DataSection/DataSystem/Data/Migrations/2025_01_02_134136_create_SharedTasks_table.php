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
        Schema::create('SharedTasks', function (Blueprint $table) {
            $table->char('sharedTaskId', 26)->primary();
            $table->char('taskId', 26)->nullable()->index('sharedtasks___fk_task_id');
            $table->char('boardId', 26)->nullable()->index('sharedtasks___fk_board_id');
            $table->char('targetId', 26)->nullable();
            $table->string('title')->nullable();
            $table->timestamp('createdAt')->nullable()->useCurrent();
            $table->timestamp('updatedAt')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SharedTasks');
    }
};
