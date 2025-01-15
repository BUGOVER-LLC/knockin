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
        Schema::create('MessageViewer', function (Blueprint $table) {
            $table->char('messageViewerId', 26)->unique('messageviewerid');
            $table->char('viewerId', 26)->index('messageviewer_users_userid_fk');
            $table->char('messageId', 26)->nullable()->index('messageviewer_messages_messageid_fk');
            $table->timestamp('createdAt')->nullable()->useCurrent();

            $table->primary(['messageViewerId']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('MessageViewer');
    }
};
