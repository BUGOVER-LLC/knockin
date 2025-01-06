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
        Schema::table('PlansFeatures', function (Blueprint $table) {
            $table->foreign(['planId'], 'PlansFeatures___fk_plan_id')->references(['planId'])->on('Plans')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('PlansFeatures', function (Blueprint $table) {
            $table->dropForeign('PlansFeatures___fk_plan_id');
        });
    }
};
