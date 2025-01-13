<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Ship\Database\Blueprint;
use Ship\Database\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('Users', function (Blueprint $table) {
            $table->foreign(['currentWorkspaceId'], 'Users___fk_current_workspace_id')->references(['workspaceId'])->on(
                'Workspaces'
            )->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Users', function (Blueprint $table) {
            $table->dropForeign('Users___fk_current_workspace_id');
        });
    }
};
