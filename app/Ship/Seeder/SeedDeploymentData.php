<?php

declare(strict_types=1);

namespace Ship\Seeder;

use Ship\Parent\Seeder\Seeder;

class SeedDeploymentData extends Seeder
{
    /**
     * Note: This seeder is not loaded automatically by nucleus
     * This is a special seeder which can be called by "nucleus:seed-deploy" command
     * It is useful for seeding data for initial deployment.
     */
    public function run(): void
    {
        // Create data for live deployment here
    }
}
