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
        Schema::create('Boards', function (Blueprint $table) {
            $table->char('boardId', 26)->primary();
            $table->char('workspaceId', 26)->index('workspaceidboards');
            $table->string('title')->nullable();
            $table->dateTime('terms')->nullable();
            $table->timestamp('createdAt')->nullable()->useCurrent();
            $table->timestamp('updatedAt')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Boards');
    }
};
