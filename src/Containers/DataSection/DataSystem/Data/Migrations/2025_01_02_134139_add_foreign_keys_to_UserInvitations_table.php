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
        Schema::table('UserInvitations', function (Blueprint $table) {
            $table->foreign(['roleId'], 'UserInvitations___fk_role_id')->references(['roleId'])->on('Roles')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['invitedUserId'], 'UserInvitations_Users_userId_fk')->references(['userId'])->on('Users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('UserInvitations', function (Blueprint $table) {
            $table->dropForeign('UserInvitations___fk_role_id');
            $table->dropForeign('UserInvitations_Users_userId_fk');
        });
    }
};
