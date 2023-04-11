<?php

namespace Src\Application\FileUser\Infrastructure\Services;

use Src\Application\FileUser\Application\Store\FileUserStoreUseCase;
use Src\Shared\Infrastructure\Services\DependencyServiceProvider as ServicesProvider;

class DependencyServicesProvider extends ServicesProvider
{

    public function __construct($app)
    {
        $this->setDependency([
                [
                    "useCase"=> [
                        \Src\Application\FileUser\Application\Get\FileUserShowUseCase::class,
                        \Src\Application\FileUser\Application\Store\FileUserStoreUseCase::class,
                        \Src\Application\FileUser\Application\Store\FileUserSavingUseCase::class,
                        \Src\Application\FileUser\Application\Get\FileUserIndexUserIdUseCase::class,
                        \Src\Application\FileUser\Application\Get\FileUserShowUserIdUseCase::class,
                        \Src\Application\FileUser\Application\Delete\FileUserDeleteUseCase::class
                    ],
                    "contract"=>\Src\Application\FileUser\Domain\Contracts\FileUserRepositoryContract::class,
                    "repository" =>\Src\Application\FileUser\Infrastructure\Repositories\Eloquent\FileUserRepository::class
                ],
            [
                "useCase"=>[
                    \Src\Management\FileHandling\Application\Get\FileShowUseCase::class,
                    \Src\Management\FileHandling\Application\Store\FileStoreUseCase::class
                ],
                "contract"=> \Src\Management\FileHandling\Domain\Contracts\FileRepositoryContract::class,
                "repository"=> \Src\Management\FileHandling\Infrastructure\Repositories\Storage\FileRepository::class,
            ]
        ]);
        parent::__construct($app);
    }
}
