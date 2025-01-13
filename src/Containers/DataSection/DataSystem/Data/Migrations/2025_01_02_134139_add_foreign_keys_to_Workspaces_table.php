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
        Schema::table('Workspaces', function (Blueprint $table) {
            $table->foreign(['creatorId'], 'Workspaces___fk_creator_id')->references(['userId'])->on('Users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['planId'], 'Workspaces___fk_plan_id')->references(['planId'])->on('Plans')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Workspaces', function (Blueprint $table) {
            $table->dropForeign('Workspaces___fk_creator_id');
            $table->dropForeign('Workspaces___fk_plan_id');
        });
    }
};
