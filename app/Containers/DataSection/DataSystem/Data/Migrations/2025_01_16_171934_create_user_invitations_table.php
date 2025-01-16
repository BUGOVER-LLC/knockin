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
        Schema::create('user_invitations', function (Blueprint $table) {
            $table->char('id', 26)->primary();
            $table->char('invited_user_id', 26)->index('userinvitations_users_userid_fk');
            $table->char('role_id', 26)->nullable()->index('userinvitations___fk_role_id');
            $table->char('token', 128)->unique('token');
            $table->string('invite_email', 200);
            $table->softDeletes();
            $table->timestamp('created_at')->nullable()->useCurrent();

            $table->unique(['id'], 'userinvitationid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_invitations');
    }
};
