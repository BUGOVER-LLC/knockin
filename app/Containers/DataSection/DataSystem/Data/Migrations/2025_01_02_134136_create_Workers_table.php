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
        Schema::create('Workers', function (Blueprint $table) {
            $table->char('workerId', 26)->primary();
            $table->char('workspaceId', 26)->nullable()->index('workers___fk_workspace_id');
            $table->char('userId', 26)->nullable()->index('workers___fk_user_id');
            $table->char('roleId', 26)->index('workers___fk_role_id');
            $table->timestamp('createdAt')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Workers');
    }
};
