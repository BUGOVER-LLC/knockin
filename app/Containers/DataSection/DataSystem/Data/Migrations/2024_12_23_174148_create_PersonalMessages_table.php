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
        Schema::create('PersonalMessages', function (Blueprint $table) {
            $table->char('personalMessageId', 26)->primary();
            $table->char('authorId', 26)->nullable()->index('authoridpersonalmessages');
            $table->char('participantId', 26)->nullable()->index('participantidpersonalmessages');
            $table->char('workspaceId', 26)->nullable()->index('workspaceidpersonalmessages');
            $table->char('parentId', 26)->nullable()->index('parentidpersonalmessages');
            $table->json('body')->nullable();
            $table->boolean('viewed')->nullable()->default(false);
            $table->dateTime('viewedAt')->nullable();
            $table->timestamp('createdAt')->nullable()->useCurrent();
            $table->timestamp('updatedAt')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PersonalMessages');
    }
};
