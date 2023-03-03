<?php

declare(strict_types=1);

namespace Src\Loaders;

trait AutoLoader
{
    use ObserverLoader;
    use ModelLoader;
    use RepositoryLoader;

    /**
     * Register method service provider
     *
     * @return void
     */
    public function runLoaderRegister(): void
    {
        $this->loadContractRepo();
    }//end runLoaderRegister()

    /**
     * Boot method service provider
     *
     * @return void
     */
    public function runLoaderBoot(): void
    {
        $this->loadMaps();
        $this->loadObservers();
    }//end runLoaderBoot()
}
