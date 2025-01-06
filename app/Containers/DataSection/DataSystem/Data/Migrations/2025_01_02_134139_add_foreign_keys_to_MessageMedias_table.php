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
        Schema::table('MessageMedias', function (Blueprint $table) {
            $table->foreign(['messageId'], 'MessageMedias___fk_message_id')->references(['messageId'])->on('Messages')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('MessageMedias', function (Blueprint $table) {
            $table->dropForeign('MessageMedias___fk_message_id');
        });
    }
};
