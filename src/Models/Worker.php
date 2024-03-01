<?php

declare(strict_types=1);

namespace Src\Models;

use Src\Core\Abstract\AbstractModel;

/**
 * Src\Models\Worker
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Worker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Worker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Worker query()
 * @property int $worker_id
 * @property int $workspace_id
 * @property int $user_id
 * @property string $created_id
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereCreatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereWorkerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereWorkspaceId($value)
 * @mixin \Eloquent
 */
class Worker extends AbstractModel
{
}
