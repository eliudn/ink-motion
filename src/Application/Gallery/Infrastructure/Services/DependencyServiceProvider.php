<?php

namespace Src\Application\Gallery\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\DependencyServiceProvider as ServiceProvider;

class DependencyServiceProvider extends ServiceProvider
{
    public function __construct($app)
    {
        $this->setDependency(
            [
                [
                    "useCase"=> [
                        \Src\Application\Gallery\Application\Post\GalleryStoreUseCase::class,
                        \Src\Application\Gallery\Application\Get\GalleryIndexUseCase::class,
                        \Src\Application\Gallery\Application\Get\GalleryShowUseCase::class,
                        \Src\Application\Gallery\Application\Update\GalleryUpdateUseCase::class,
                        \Src\Application\Gallery\Application\Destroy\GalleryDestroyUseCase::class
                    ],
                    "contract"=>\Src\Application\Gallery\Domain\Contract\GalleryRepositoryContract::class,
                    "repository" =>\Src\Application\Gallery\Infrastructure\Repositories\Eloquent\GalleryRepository::class
                ]


            ]
        );
        parent::__construct($app);
    }
}
