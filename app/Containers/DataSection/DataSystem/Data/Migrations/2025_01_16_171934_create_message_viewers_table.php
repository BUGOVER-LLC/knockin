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
        Schema::create('message_viewers', function (Blueprint $table) {
            $table->char('id', 26)->unique('messageviewerid');
            $table->char('viewer_id', 26)->index('messageviewer_users_userid_fk');
            $table->char('message_id', 26)->nullable()->index('messageviewer_messages_messageid_fk');
            $table->timestamp('created_at')->nullable()->useCurrent();

            $table->primary(['id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_viewers');
    }
};
