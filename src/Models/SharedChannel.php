<?php

declare(strict_types=1);

namespace Src\Models;

use Src\Core\Abstract\AbstractModel;

/**
 * Src\Models\SharedChannel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|SharedChannel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SharedChannel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SharedChannel query()
 * @property int $shared_channel_id
 * @property int $channel_id
 * @property int $workspace_id
 * @property int $target_id
 * @property string $uid
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SharedChannel whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedChannel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedChannel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedChannel whereSharedChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedChannel whereTargetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedChannel whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedChannel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SharedChannel whereWorkspaceId($value)
 * @mixin \Eloquent
 */
class SharedChannel extends AbstractModel
{
}
