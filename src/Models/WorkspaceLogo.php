<?php

declare(strict_types=1);

namespace Src\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Src\Core\Abstract\AbstractModel;
use Src\Core\Attribute\ModelEntity;
use Src\Repositories\WorkspaceLogoRepository;

/**
 * Src\Models\WorkspaceLogo
 *
 * @property-read \Src\Models\Workspace|null $workspace
 * @method static \Illuminate\Database\Eloquent\Builder|WorkspaceLogo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkspaceLogo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkspaceLogo query()
 * @mixin \Eloquent
 */
#[ModelEntity(repositoryClass: WorkspaceLogoRepository::class, readonly: true)]
class WorkspaceLogo extends AbstractModel
{
    protected $fillable = [
        'workspace_id',
        'original_name',
        'name',
        'size',
        'path',
    ];

    /**
     * @return BelongsTo
     */
    public function workspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class, 'workspace_id', 'workspace_id');
    }
}
