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
        Schema::create('UserInvitations', function (Blueprint $table) {
            $table->char('userInvitationId', 26)->primary();
            $table->char('invitedUserId', 26)->index('userinvitations_users_userid_fk');
            $table->char('roleId', 26)->nullable()->index('userinvitations___fk_role_id');
            $table->char('token', 128)->unique('token');
            $table->string('inviteEmail', 200);
            $table->timestamp('deletedAt')->nullable();
            $table->timestamp('createdAt')->nullable()->useCurrent();

            $table->unique(['userInvitationId'], 'userinvitationid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('UserInvitations');
    }
};
