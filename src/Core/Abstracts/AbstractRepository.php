<?php

declare(strict_types=1);

namespace Src\Core\Abstracts;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as AuthenticatableModel;

abstract class AbstractRepository
{
    /**
     * @param Model|AuthenticatableModel $model
     */
    public function __construct(protected readonly Model|AuthenticatableModel $model)
    {
    }

    /**
     * Creates a new QueryBuilder instance that is prepopulated for this entity name.
     *
     * @param ?string $alias
     * @param array $columns
     * @param null $index_by The index for the from.
     * @return QueryBuilder
     */
    protected function createQueryBuilder(
        string $alias = null,
        array $columns = [],
        $index_by = null
    ): QueryBuilder
    {
        return DB::table($this->getTable(), $alias)->select($columns)->from(
            $this->getTable(),
            $alias
        )->useIndex(
            $index_by
        );
    }

    /**
     * @return string|null
     */
    public function getTable(): ?string
    {
        return $this->model->getTable();
    }

    /**
     * Creates a new QueryBuilder instance that is prepopulated for this entity name.
     *
     * @param ?string $alias
     * @param array $columns
     * @param null $index_by The index for the from.
     * @return EloquentBuilder
     */
    protected function createModelBuilder(
        string $alias = null,
        array $columns = [],
        $index_by = null
    ): EloquentBuilder
    {
        return $this->model::query()->select($columns)->from($this->getTable(), $alias)->useIndex(
            $index_by
        );
    }
}
