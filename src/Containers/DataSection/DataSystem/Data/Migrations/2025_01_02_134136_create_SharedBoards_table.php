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
        Schema::create('SharedBoards', function (Blueprint $table) {
            $table->char('sharedBoardId', 26)->primary();
            $table->char('workspaceId', 26)->nullable()->index('sharedboards___fk_workspace_id');
            $table->char('boardId', 26)->nullable()->index('sharedboards___fk_board_id');
            $table->char('targetId', 26)->nullable();
            $table->string('name')->nullable();
            $table->timestamp('createdAt')->nullable()->useCurrent();
            $table->timestamp('updatedAt')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SharedBoards');
    }
};
