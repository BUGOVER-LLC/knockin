<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nucleus\Loaders\SeederLoaderTrait;

class DatabaseSeeder extends Seeder
{
    use SeederLoaderTrait;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->runLoadingSeeders();
    }
}
