<?php

declare(strict_types=1);

namespace Src\Models;

use Src\Core\Abstract\AbstractModel;

/**
 * Src\Models\SharedTask
 *
 * @method static \Illuminate\Database\Eloquent\Builder|SharedTask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SharedTask newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SharedTask query()
 * @property int $shared_task_id
 * @property int $task_id
 * @property int $board_id
 * @property int $target_id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SharedTask whereBoardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedTask whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedTask whereSharedTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedTask whereTargetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedTask whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedTask whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedTask whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SharedTask extends AbstractModel
{
}
