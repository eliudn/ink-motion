<?php

namespace Src\Application\Gallery\Application\Get;

use Src\Application\Gallery\Domain\Contract\GalleryRepositoryContract;
use Src\Application\Gallery\Domain\GalleryEntity;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

class GalleryShowUseCase
{
    public function __construct(
        private readonly GalleryRepositoryContract $galleryRepositoryContract
    )
    {
    }

    public function __invoke(string $userId): GalleryEntity
    {
        return $this->galleryRepositoryContract->show(new UserIdValueObject($userId));
    }
}
