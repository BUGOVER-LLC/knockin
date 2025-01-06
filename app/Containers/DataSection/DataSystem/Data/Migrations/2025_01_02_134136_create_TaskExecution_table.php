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
        Schema::create('TaskExecution', function (Blueprint $table) {
            $table->char('taskExecutionId', 26)->primary();
            $table->char('taskId', 26)->nullable()->index('taskexecution___fk_task_id');
            $table->char('executorId', 26)->nullable()->index('taskexecution___fk_executir_id');
            $table->timestamp('createdAt')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TaskExecution');
    }
};
