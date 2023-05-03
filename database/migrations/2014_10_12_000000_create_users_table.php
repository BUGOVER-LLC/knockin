<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('pgsql_app')->create('users', function (Blueprint $table) {
            $table->id('user_id')->index('users_index_user_id');

            $table->unsignedBigInteger('current_workspace_id')->nullable()->index('users_index_current_workspace_id');
            $table->unsignedBigInteger('current_device_id')->nullable()->index('users_index_current_device_id');
            $table->uuid('uid')->unique();
            $table->string('name', 150)->nullable()->unique();
            $table->string('phone', 25)->nullable()->unique();
            $table->string('email', 200)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('verified_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_app')->dropIfExists('users');
    }
};
