<?php

namespace Src\Application\MediaRepositories\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\DependencyServiceProvider as ServiceProvider;
class DependencyServicesProvider extends ServiceProvider
{
    public function __construct($app)
    {
        $this->setDependency([
            [
                "useCase"=>[
                    \Src\Application\MediaRepositories\Application\Store\RepositoryStoreUseCase::class,
                    \Src\Application\MediaRepositories\Application\Get\RepositoryIndexUserIdUseCase::class,
                    \Src\Application\MediaRepositories\Application\Get\RepositoryShowUseCase::class,
                    \Src\Application\MediaRepositories\Application\Update\RepositoryUpdateUseCase::class,
                    \Src\Application\MediaRepositories\Application\Delete\RepositoryDeleteUseCase::class,
                    \Src\Application\MediaRepositories\Application\Update\RepositoryUpdateImageUseCase::class,
                    \Src\Application\MediaRepositories\Application\Update\RepositoryUpdateStatusUseCase::class
                ],
                "contract"=>\Src\Application\MediaRepositories\Domain\Contracts\MediaRepositoryRepositoryContract::class,
                "repository"=>\Src\Application\MediaRepositories\Infrastructure\Repositories\Eloquent\MediaRepositoryRepository::class
            ],
            [
                "useCase"=>[
                    \Src\Application\MediaRepositories\Application\Validation\RepositoryCheckStatusUseCase::class
                ],
                "contract"=>\Src\Application\MediaRepositories\Domain\Contracts\MediaRepositoryValidationContract::class,
                "repository"=>\Src\Application\MediaRepositories\Infrastructure\Repositories\Eloquent\MediaRepositoryValidation::class
            ]

        ]);
        parent::__construct($app);
    }
}
