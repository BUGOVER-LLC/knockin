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
        Schema::table('plans_features', function (Blueprint $table) {
            $table->foreign(['plan_id'], 'PlansFeatures___fk_plan_id')->references(['id'])->on('plans')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plans_features', function (Blueprint $table) {
            $table->dropForeign('PlansFeatures___fk_plan_id');
        });
    }
};