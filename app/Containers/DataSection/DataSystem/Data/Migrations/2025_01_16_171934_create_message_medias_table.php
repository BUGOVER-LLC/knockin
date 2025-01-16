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
        Schema::create('message_medias', function (Blueprint $table) {
            $table->char('id', 26)->primary();
            $table->char('message_id', 26)->index('messagemedias___fk_message_id');
            $table->integer('size')->nullable();
            $table->string('type', 7)->nullable();
            $table->string('path', 300)->nullable();
            $table->char('name', 128)->nullable();
            $table->string('original_name', 1000)->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_medias');
    }
};
