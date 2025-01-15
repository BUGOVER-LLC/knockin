<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Ship\Database\Blueprint;
use Ship\Database\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('Users', function (Blueprint $table) {
            $table->string('stripeId')->nullable()->index();
            $table->string('pmType')->nullable();
            $table->string('pmLastFour', 4)->nullable();
            $table->timestamp('trialEndsAt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Users', function (Blueprint $table) {
            $table->dropIndex([
                'stripeId',
            ]);

            $table->dropColumn([
                'stripeId',
                'pmType',
                'pmLastFour',
                'trialEndsAt',
            ]);
        });
    }
};
