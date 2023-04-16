<?php

namespace Src\Application\GalleryFileUser\Infrastructure\Services;


use Src\Shared\Infrastructure\Services\DependencyServiceProvider as ServicesProvider;
class DependencyServicesProvider extends ServicesProvider
{
    public function __construct($app)
    {
        $this->setDependency([
            [
                "useCase"=>[
                    \Src\Application\GalleryFileUser\Application\store\GalleryFileAddUseCase::class,
                    //\Src\Application\GalleryFileUser\Application\Get\GalleryFileIndexUseCase::class,
                    //\Src\Application\GalleryFileUser\Application\Get\GalleryFileShowUseCase::class,
                    //\Src\Application\GalleryFileUser\Application\Update\GalleryFileMoveUseCase::class,
                    //\Src\Application\GalleryFileUser\Application\Delete\GalleryFileDeleteUseCase::class,

                ],
                "contract"=>\Src\Application\GalleryFileUser\Domain\Contracts\GalleryFileRepositoryContract::class,
                "repository"=>\Src\Application\GalleryFileUser\Infrastructure\Repositories\Eloquent\GalleryFileRepository::class
            ]
        ]);
        parent::__construct($app);
    }
}
