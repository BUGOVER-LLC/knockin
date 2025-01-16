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
        Schema::table('shared_boards', function (Blueprint $table) {
            $table->foreign(['board_id'], 'SharedBoards___fk_board_id')->references(['id'])->on('boards')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['workspace_id'], 'SharedBoards___fk_workspace_id')->references(['id'])->on('workspaces')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shared_boards', function (Blueprint $table) {
            $table->dropForeign('SharedBoards___fk_board_id');
            $table->dropForeign('SharedBoards___fk_workspace_id');
        });
    }
};
