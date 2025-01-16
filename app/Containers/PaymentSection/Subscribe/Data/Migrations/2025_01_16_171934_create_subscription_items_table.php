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
        Schema::create('subscription_items', function (Blueprint $table) {
            $table->char('id', 26)->primary();
            $table->char('subscription_id', 26)->nullable();
            $table->string('stripe_id')->unique('subscriptionitems_stripeid_unique');
            $table->string('stripe_product');
            $table->decimal('stripe_price');
            $table->integer('quantity')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->index(['subscription_id', 'stripe_price'], 'subscriptionitems_subscriptionid_stripeprice_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_items');
    }
};
