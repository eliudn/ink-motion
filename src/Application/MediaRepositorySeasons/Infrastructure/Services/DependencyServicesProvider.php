<?php

namespace Src\Application\MediaRepositorySeasons\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\DependencyServiceProvider as ServiceProvider;
final  class DependencyServicesProvider extends ServiceProvider
{
    public function __construct($app)
    {
        $this->setDependency([
            [
                "useCase"=>[
                    \Src\Application\MediaRepositorySeasons\Application\Store\SeasonStoreUseCase::class,
                    \Src\Application\MediaRepositorySeasons\Application\Get\SeasonShowUseCase::class,
                    \Src\Application\MediaRepositorySeasons\Application\Update\SeasonUpdateStatusUseCase::class,
                    \Src\Application\MediaRepositorySeasons\Application\Get\SeasonShowByOrderByRepositoryIdUseCase::class

                ],
                "contract"=>\Src\Application\MediaRepositorySeasons\Domain\Contracts\SeasonRepositoryContract::class,
                "repository"=>\Src\Application\MediaRepositorySeasons\Infrastructure\Repositories\Eloquent\RepositorySeason::class
            ],
            [
                "useCase"=>[
                    \Src\Application\MediaRepositorySeasons\Application\Validation\SeasonVerifyLastRecordFinalizationUseCase::class
                ],
                "contract"=>\Src\Application\MediaRepositorySeasons\Domain\Contracts\SeasonValidationContract::class,
                "repository"=>\Src\Application\MediaRepositorySeasons\Infrastructure\Repositories\Eloquent\SeasonValidation::class
            ]
        ]);
        parent::__construct($app);
    }
}
