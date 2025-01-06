<?php

declare(strict_types=1);

use App\Ship\Database\Blueprint;
use App\Ship\Database\Schema;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OauthClients', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable()->index()->comment('This key reference to Systems');
            $table->string('name');
            $table->string('secret', 100)->nullable();
            $table->string('provider')->nullable();
            $table->text('redirect');
            $table->boolean('personal_access_client');
            $table->boolean('password_client');
            $table->boolean('revoked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('OauthClients');
    }
};
