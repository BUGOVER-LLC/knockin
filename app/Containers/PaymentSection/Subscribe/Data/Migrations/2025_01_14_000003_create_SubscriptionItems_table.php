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
        Schema::create('SubscriptionItems', function (Blueprint $table) {
            $table->ulidPrimary('subscriptionItemId');
            $table->foreignUlid('subscriptionId')
                ->nullable()
                ->constrained('Subscriptions', 'subscriptionId')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('stripeId')->unique();
            $table->string('stripeProduct');
            $table->string('stripePrice');
            $table->integer('quantity')->nullable();
            $table->timestamps();

            $table->index(['subscriptionId', 'stripePrice']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SubscriptionItems');
    }
};
