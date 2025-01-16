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
        Schema::create('personal_messages', function (Blueprint $table) {
            $table->char('id', 26)->primary();
            $table->char('author_id', 26)->nullable()->index('authoridpersonalmessages');
            $table->char('participant_id', 26)->nullable()->index('participantidpersonalmessages');
            $table->char('workspace_id', 26)->nullable()->index('workspaceidpersonalmessages');
            $table->char('parent_id', 26)->nullable()->index('parentidpersonalmessages');
            $table->json('body')->nullable();
            $table->boolean('viewed')->nullable()->default(false);
            $table->dateTime('viewed_at')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_messages');
    }
};
