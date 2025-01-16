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
        Schema::table('plan_role', function (Blueprint $table) {
            $table->foreign(['plan_id'], 'PlanRole___fk_plan_id')->references(['id'])->on('plans')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['role_id'], 'PlanRole___fk_role_id')->references(['id'])->on('roles')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plan_role', function (Blueprint $table) {
            $table->dropForeign('PlanRole___fk_plan_id');
            $table->dropForeign('PlanRole___fk_role_id');
        });
    }
};
