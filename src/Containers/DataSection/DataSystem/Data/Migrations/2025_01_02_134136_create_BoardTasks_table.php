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
        Schema::create('BoardTasks', function (Blueprint $table) {
            $table->char('boardTaskId', 26)->primary();
            $table->char('stapeId', 26)->nullable()->index('stapeidboardtasks');
            $table->char('channelId', 26)->nullable()->index('channelidboardtasks');
            $table->char('creatorId', 26)->nullable()->index('creatoridboardtasks');
            $table->string('title')->nullable();
            $table->json('body')->nullable();
            $table->boolean('assigned')->nullable()->default(false);
            $table->enum('status', ['test'])->nullable();
            $table->timestamp('createdAt')->nullable()->useCurrent();
            $table->timestamp('updatedAt')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BoardTasks');
    }
};
