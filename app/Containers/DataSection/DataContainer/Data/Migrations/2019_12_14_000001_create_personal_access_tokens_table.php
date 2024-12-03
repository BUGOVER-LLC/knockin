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
        Schema::create('PersonalAccessTokens', function (Blueprint $table) {
            $table->ulid('personalAccessTokenId')->index('personal_access_tokens_index_personal_access_token_id');
            $table->foreignUlid('userId')->index('personal_access_tokens_index_user_id');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('lastUsedAt')->nullable();
            $table->timestamp('expiresAt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PersonalAccessTokens');
    }
};
