<?php

namespace Ship\Criterias;

use Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class IsNullCriteria extends Criteria
{
    private string $field;

    public function __construct(string $field)
    {
        $this->field = $field;
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->whereNull($this->field);
    }
}
