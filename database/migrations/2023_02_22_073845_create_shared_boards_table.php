<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::connection('pgsql_app')->create('shared_boards', function (Blueprint $table) {
            $table->id('shared_board_id')->index('shared_boards_index_shared_board_id');

            $table->unsignedBigInteger('board_id')->index('shared_boards_index_board_id');
            $table->unsignedBigInteger('main_workspace_id')->index('shared_boards_index_main_workspace_id');
            $table->unsignedBigInteger('target_workspace_id')->index('shared_boards_index_target_workspace_id');
            $table->string('name');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::connection('pgsql_app')->dropIfExists('shared_boards');
    }
};
