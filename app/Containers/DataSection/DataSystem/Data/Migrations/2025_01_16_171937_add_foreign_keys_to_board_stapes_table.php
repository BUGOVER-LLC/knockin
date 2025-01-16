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
        Schema::table('board_stapes', function (Blueprint $table) {
            $table->foreign(['board_id'], 'boardIdBoardStapes')->references(['id'])->on('boards')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('board_stapes', function (Blueprint $table) {
            $table->dropForeign('boardIdBoardStapes');
        });
    }
};
