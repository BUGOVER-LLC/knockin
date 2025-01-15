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
        Schema::create('PlanRole', function (Blueprint $table) {
            $table->char('planRoleId', 26)->primary();
            $table->char('roleId', 26)->unique('roleid');
            $table->char('planId', 26)->unique('planid');
            $table->timestamp('createdAt')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PlanRole');
    }
};
