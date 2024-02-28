<?php

declare(strict_types=1);

namespace Src\Http\Controllers\App;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Src\Core\Abstracts\AbstractAction;

class DashboardIndexController extends AbstractAction
{
    /**
     * @param string $workspace_id
     * @param string|null $target_id
     * @param string|null $second_target_id
     * @param string|null $thread_target_id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function __invoke(
        string $workspace_id,
        ?string $target_id = null,
        ?string $second_target_id = null,
        ?string $thread_target_id = null
    ) {
        return view('app.dashboard');
    }
}
