<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\Data\Repository;

use Containers\AuthSection\Plan\Model\Plan;
use Containers\AuthSection\Plan\Model\PlanFeature;
use Illuminate\Contracts\Container\Container;
use Illuminate\Database\Eloquent\Collection;
use Service\Repository\Repositories\EloquentRepository;

class PlanFeatureRepository extends EloquentRepository
{
    public function __construct(Container $container)
    {
        $this
            ->setContainer($container)
            ->setModel(PlanFeature::class)
            ->setRepositoryId(PlanFeature::getTableName())
            ->setCacheDriver('redis');
    }

    /**
     * @return Collection<Plan>
     */
    public function findAllAvailablePlansWithFeatures(): Collection
    {
        return $this
            ->where('active', '=', true)
            ->with('plan')
            ->findAll();
    }
}
