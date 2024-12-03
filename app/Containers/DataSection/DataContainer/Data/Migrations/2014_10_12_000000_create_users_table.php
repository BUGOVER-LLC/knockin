<?php

declare(strict_types=1);

use App\Containers\DataSection\DataContainer\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Users', function (Blueprint $table) {
            $table->ulid('userId')->index('users_index_user_id');

            $table->foreignUlid('currentWorkspaceId')->nullable()->index('users_index_current_workspace_id');
            $table->foreignUlid('currentDeviceId')->nullable()->index('users_index_current_device_id');
            $table->string('name', 150)->nullable()->unique();
            $table->string('phone', 32)->nullable()->unique();
            $table->string('email', 250)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('verifiedAt')->nullable();

            $table->timestamps();
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
