<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Ship\Database\Blueprint;
use Ship\Database\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Subscriptions', function (Blueprint $table) {
            $table->char('subscriptionId', 26);
            $table->foreignId('userId');
            $table->string('type');
            $table->string('stripeId')->unique();
            $table->string('stripeStatus');
            $table->string('stripePrice')->nullable();
            $table->integer('quantity')->nullable();
            $table->timestamp('trialEndsAt')->nullable();
            $table->timestamp('endsAt')->nullable();
            $table->timestamps();

            $table->index(['userId', 'stripeStatus']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Subscriptions');
    }
};
