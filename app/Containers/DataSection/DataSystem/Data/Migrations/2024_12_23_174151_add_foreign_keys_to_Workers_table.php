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
        Schema::table('Workers', function (Blueprint $table) {
            $table->foreign(['userId'], 'Workers___fk_user_id')->references(['userId'])->on('Users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['workspaceId'], 'Workers___fk_workspace_id')->references(['workspaceId'])->on('Workspaces')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Workers', function (Blueprint $table) {
            $table->dropForeign('Workers___fk_user_id');
            $table->dropForeign('Workers___fk_workspace_id');
        });
    }
};
