<?php

namespace Src\Application\UserInformation\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\DependencyServiceProvider as ServiceProvider;

class DependencyServiceProvider extends ServiceProvider
{
    public function __construct($app)
    {
        $this->setDependency([
                [
                    "useCase"=> [
                        \Src\Application\UserInformation\Application\Get\UserInformationIndexUseCase::class,
                        \Src\Application\UserInformation\Application\Store\UserInformationStoreUseCase::class,
                        \Src\Application\UserInformation\Application\Get\UserInformationShowUseCase::class,
                        \Src\Application\UserInformation\Application\Update\UserInformationUpdateUseCase::class,
                        \Src\Application\UserInformation\Application\Delete\UserInformationDestroyUseCase::class
                    ],
                    "contract"=>\Src\Application\UserInformation\Domain\Contracts\UserInformationRepositoryContract::class,
                    "repository" =>\Src\Application\UserInformation\Infrastructure\Repositories\Eloquent\UserInformationRepository::class
                ]
        ]);
        parent::__construct($app);
    }
}
