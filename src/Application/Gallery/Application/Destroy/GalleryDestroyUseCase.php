<?php

namespace Src\Application\Gallery\Application\Destroy;

use Src\Application\Gallery\Domain\Contract\GalleryRepositoryContract;
use Src\Application\Gallery\Domain\GalleryEntity;
use Src\Application\Gallery\Domain\ValueObjects\GalleryIdValueObject;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

class GalleryDestroyUseCase
{
    public function __construct(
        private readonly GalleryRepositoryContract $galleryRepositoryContract
    )
    {
    }

    public function __invoke(string $userId, int $galleryId):GalleryEntity
    {
       return $this->galleryRepositoryContract->destroy(
           new GalleryIdValueObject($galleryId),
           new UserIdValueObject($userId)
       );
    }
}
