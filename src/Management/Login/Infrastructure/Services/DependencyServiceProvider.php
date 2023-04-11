<?php

namespace Src\Management\Login\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\DependencyServiceProvider as ServiceProvider;

class DependencyServiceProvider extends ServiceProvider
{
    public function __construct($app)
    {
        $this->setDependency(
            [
                [
                    "useCase"=> [
                        \Src\Management\Login\Applications\Login\LoginAuthUseCase::class
                    ],
                    "contract"=>\Src\Management\Login\Domain\Contracts\LoginRepositoryContract::class,
                    "repository" =>\Src\Management\Login\Infrastructure\Repositories\Eloquent\LoginRepository::class
                ],
                [
                    "useCase"=> [
                        \Src\Management\Login\Applications\Auth\LoginAuthenticationUseCase::class,
                        \Src\Management\Login\Applications\Auth\LoginRoleAuthenticationUseCase::class,
                        \Src\Management\Login\Applications\Auth\LoginCheckAuthenticationUseCase::class
                    ],
                    "contract"=>\Src\Management\Login\Domain\Contracts\LoginAuthenticationContract::class,
                    "repository" =>\Src\Management\Login\Infrastructure\Repositories\FirebaseJwt\LoginAuthentication::class
                ]

            ]
        );
        parent::__construct($app);
    }
}
