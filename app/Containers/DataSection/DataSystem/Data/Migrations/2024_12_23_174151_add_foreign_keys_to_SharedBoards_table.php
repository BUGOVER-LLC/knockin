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
        Schema::table('SharedBoards', function (Blueprint $table) {
            $table->foreign(['boardId'], 'SharedBoards___fk_board_id')->references(['boardId'])->on('Boards')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['workspaceId'], 'SharedBoards___fk_workspace_id')->references(['workspaceId'])->on('Workspaces')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('SharedBoards', function (Blueprint $table) {
            $table->dropForeign('SharedBoards___fk_board_id');
            $table->dropForeign('SharedBoards___fk_workspace_id');
        });
    }
};
