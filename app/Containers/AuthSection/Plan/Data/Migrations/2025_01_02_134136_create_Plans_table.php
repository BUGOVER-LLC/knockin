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
        Schema::create('Plans', function (Blueprint $table) {
            $table->char('planId', 26)->primary();
            $table->string('planName')->unique('planname');
            $table->text('planDescription')->nullable();
            $table->decimal('planPrice')->nullable();
            $table->boolean('trial')->nullable()->default(true);
            $table->boolean('active')->nullable()->default(true);
            $table->timestamp('createdAt')->nullable()->useCurrent();
            $table->timestamp('updatedAt')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Plans');
    }
};
