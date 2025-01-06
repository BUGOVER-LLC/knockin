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
        Schema::create('MessageMedias', function (Blueprint $table) {
            $table->char('messageMediaId', 26)->primary();
            $table->char('messageId', 26)->index('messagemedias___fk_message_id');
            $table->integer('size')->nullable();
            $table->string('type', 7)->nullable();
            $table->string('path', 300)->nullable();
            $table->char('name', 128)->nullable();
            $table->string('originalName', 1000)->nullable();
            $table->timestamp('createdAt')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('MessageMedias');
    }
};
