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
        Schema::table('user_invitations', function (Blueprint $table) {
            $table->foreign(['role_id'], 'UserInvitations___fk_role_id')->references(['id'])->on('roles')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['invited_user_id'], 'UserInvitations_Users_userId_fk')->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_invitations', function (Blueprint $table) {
            $table->dropForeign('UserInvitations___fk_role_id');
            $table->dropForeign('UserInvitations_Users_userId_fk');
        });
    }
};
