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
        Schema::table('Boards', function (Blueprint $table) {
            $table->foreign(['workspaceId'], 'workspaceIdBoards')->references(['workspaceId'])->on('Workspaces')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Boards', function (Blueprint $table) {
            $table->dropForeign('workspaceIdBoards');
        });
    }
};
