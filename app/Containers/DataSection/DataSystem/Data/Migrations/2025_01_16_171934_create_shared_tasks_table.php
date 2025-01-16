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
        Schema::create('shared_tasks', function (Blueprint $table) {
            $table->char('id', 26)->primary();
            $table->char('task_id', 26)->nullable()->index('sharedtasks___fk_task_id');
            $table->char('board_id', 26)->nullable()->index('sharedtasks___fk_board_id');
            $table->char('target_id', 26)->nullable();
            $table->string('title')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shared_tasks');
    }
};
