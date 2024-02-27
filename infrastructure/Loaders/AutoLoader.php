<?php

declare(strict_types=1);

namespace Infrastructure\Loaders;

trait AutoLoader
{
    use ObserverLoader;
    use ModelLoader;

    /**
     * Register method service provider
     *
     * @return void
     */
    public function runLoaderRegister(): void
    {
    }

    /**
     * Boot method service provider
     *
     * @return void
     */
    public function runLoaderBoot(): void
    {
        $this->loadMaps();
        $this->loadObservers();
    }
}
