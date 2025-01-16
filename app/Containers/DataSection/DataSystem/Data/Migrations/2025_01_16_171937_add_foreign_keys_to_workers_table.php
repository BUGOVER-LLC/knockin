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
        Schema::table('workers', function (Blueprint $table) {
            $table->foreign(['role_id'], 'Workers___fk_role_id')->references(['id'])->on('roles')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['user_id'], 'Workers___fk_user_id')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['workspace_id'], 'Workers___fk_workspace_id')->references(['id'])->on('workspaces')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('workers', function (Blueprint $table) {
            $table->dropForeign('Workers___fk_role_id');
            $table->dropForeign('Workers___fk_user_id');
            $table->dropForeign('Workers___fk_workspace_id');
        });
    }
};
