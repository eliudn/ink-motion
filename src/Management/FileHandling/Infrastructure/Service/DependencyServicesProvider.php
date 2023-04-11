<?php

namespace Src\Management\FileHandling\Infrastructure\Service;

use Src\Shared\Infrastructure\Services\DependencyServiceProvider as ServicesProvider;

class DependencyServicesProvider extends ServicesProvider
{
    public function __construct($app)
    {
        $this->setDependency([
            [
                "useCase"=>[
                    //
                ],
                "contract"=> \Src\Management\FileHandling\Domain\Contracts\FileRepositoryContract::class,
                "repository"=>\Src\Management\FileHandling\Infrastructure\Repositories\Storage\FileRepository::class,
            ]
        ]);
        parent::__construct($app);
    }
}
