<?php

declare(strict_types=1);

namespace Src\Models;

use Src\Core\Abstract\AbstractModel;

/**
 * Src\Models\SharedBoard
 *
 * @method static \Illuminate\Database\Eloquent\Builder|SharedBoard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SharedBoard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SharedBoard query()
 * @property int $shared_board_id
 * @property int $board_id
 * @property int $workspace_id
 * @property int $target_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SharedBoard whereBoardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedBoard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedBoard whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedBoard whereSharedBoardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedBoard whereTargetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedBoard whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedBoard whereWorkspaceId($value)
 * @mixin \Eloquent
 */
class SharedBoard extends AbstractModel
{
}
