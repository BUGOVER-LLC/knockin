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
        Schema::create('task_execution', function (Blueprint $table) {
            $table->char('id', 26)->primary();
            $table->char('task_id', 26)->nullable()->index('taskexecution___fk_task_id');
            $table->char('executor_id', 26)->nullable()->index('taskexecution___fk_executir_id');
            $table->timestamp('created_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_execution');
    }
};
