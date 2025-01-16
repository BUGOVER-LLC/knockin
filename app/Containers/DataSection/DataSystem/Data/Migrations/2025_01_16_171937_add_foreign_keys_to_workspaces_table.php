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
        Schema::table('workspaces', function (Blueprint $table) {
            $table->foreign(['creator_id'], 'Workspaces___fk_creator_id')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['plan_id'], 'Workspaces___fk_plan_id')->references(['id'])->on('plans')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('workspaces', function (Blueprint $table) {
            $table->dropForeign('Workspaces___fk_creator_id');
            $table->dropForeign('Workspaces___fk_plan_id');
        });
    }
};
