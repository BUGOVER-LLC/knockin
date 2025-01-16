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
        Schema::table('message_medias', function (Blueprint $table) {
            $table->foreign(['message_id'], 'MessageMedias___fk_message_id')->references(['id'])->on('messages')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('message_medias', function (Blueprint $table) {
            $table->dropForeign('MessageMedias___fk_message_id');
        });
    }
};
