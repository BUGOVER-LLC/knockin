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
        Schema::create('users', function (Blueprint $table) {
            $table->char('id', 26)->primary();
            $table->char('current_workspace_id', 26)->nullable()->index('users___fk_current_workspace_id');
            $table->char('current_device_id', 26)->nullable();
            $table->string('phone', 21)->nullable()->unique('phone');
            $table->string('email')->nullable()->unique('email');
            $table->string('password', 250)->nullable();
            $table->string('stripe_id')->nullable()->index('users_stripeid_index');
            $table->string('pm_type')->nullable();
            $table->string('pm_last_four', 4)->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();

            $table->unique(['id'], 'userid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
