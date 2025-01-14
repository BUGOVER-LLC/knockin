<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Ship\Database\Schema;
use Ship\Database\Blueprint;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mysql')->create('webhooks', function (Blueprint $table) {
            $table->id();

            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webhooks');
    }
};
