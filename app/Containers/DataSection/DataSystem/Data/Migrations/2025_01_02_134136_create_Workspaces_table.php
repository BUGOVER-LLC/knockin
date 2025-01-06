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
        Schema::create('Workspaces', function (Blueprint $table) {
            $table->char('workspaceId', 26)->primary();
            $table->char('creatorId', 26)->index('workspaces___fk_creator_id');
            $table->char('planId', 26)->index('workspaces___fk_plan_id');
            $table->string('name', 250);
            $table->timestamp('createdAt')->nullable()->useCurrent();
            $table->timestamp('updatedAt')->nullable()->useCurrent();

            $table->unique(['workspaceId'], 'workspaceid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Workspaces');
    }
};
