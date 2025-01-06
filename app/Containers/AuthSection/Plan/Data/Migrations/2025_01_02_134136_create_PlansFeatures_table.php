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
        Schema::create('PlansFeatures', function (Blueprint $table) {
            $table->char('planFeatureId', 26)->primary();
            $table->char('planId', 26)->nullable()->index('plansfeatures___fk_plan_id');
            $table->string('planFeatureName');
            $table->string('planFeatureDescription', 1000)->nullable();
            $table->timestamp('createdAt')->nullable()->useCurrent();
            $table->timestamp('updatedAt')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PlansFeatures');
    }
};
