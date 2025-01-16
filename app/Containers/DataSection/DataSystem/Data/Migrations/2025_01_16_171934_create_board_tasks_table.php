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
        Schema::create('board_tasks', function (Blueprint $table) {
            $table->char('id', 26)->primary();
            $table->char('stape_id', 26)->nullable()->index('stapeidboardtasks');
            $table->char('channel_id', 26)->nullable()->index('channelidboardtasks');
            $table->char('creator_id', 26)->nullable()->index('creatoridboardtasks');
            $table->string('title')->nullable();
            $table->json('body')->nullable();
            $table->boolean('assigned')->nullable()->default(false);
            $table->enum('status', ['test'])->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board_tasks');
    }
};
