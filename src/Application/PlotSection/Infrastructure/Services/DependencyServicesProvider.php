<?php

namespace Src\Application\PlotSection\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\DependencyServiceProvider as ServiceProvider;
class DependencyServicesProvider extends ServiceProvider
{
    public function __construct($app)
    {
        $this->setDependency([
            [
                "useCase"=>[
                    //\Src\Application\PlotSection\Application\Get\PlotSectionShowByOrderUseCase::class,
                    \Src\Application\PlotSection\Application\Store\PlotSectionAddUseCase::class,
                ],
                "contract"=>\Src\Application\PlotSection\Domain\Contracts\PlotSectionRepositoryContract::class,
                "repository"=>\Src\Application\PlotSection\Infrastructure\Repositories\Eloquent\PlotSectionRepository::class
            ]
        ]);
        parent::__construct($app);
    }
}
