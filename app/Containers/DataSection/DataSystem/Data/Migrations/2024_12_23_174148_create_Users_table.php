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
        Schema::create('Users', function (Blueprint $table) {
            $table->char('userId', 26)->primary();
            $table->char('currentWorkspaceId', 26)->nullable()->index('users___fk_current_workspace_id');
            $table->char('currentDeviceId', 26)->nullable();
            $table->string('phone', 21)->nullable()->unique('phone');
            $table->string('email')->nullable()->unique('email');
            $table->string('password', 250)->nullable();
            $table->timestamp('createdAt')->nullable()->useCurrent();
            $table->timestamp('updatedAt')->nullable()->useCurrent();

            $table->unique(['userId'], 'userid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Users');
    }
};
