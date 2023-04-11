<?php

namespace Src\Application\Gallery\Application\Update;

use Src\Application\Gallery\Domain\Contract\GalleryRepositoryContract;
use Src\Application\Gallery\Domain\GalleryEntity;
use Src\Application\Gallery\Domain\ValueObjects\GalleryIdValueObject;
use Src\Application\Gallery\Domain\ValueObjects\GalleryUpdateValueObject;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

class GalleryUpdateUseCase
{

    public function __construct(
        private readonly GalleryRepositoryContract $galleryRepositoryContract
    )
    {
    }
    public function __invoke(array $request, string $userId, int $galleryId): GalleryEntity
    {
        return $this->galleryRepositoryContract->update(
            new GalleryUpdateValueObject($request),
            new UserIdValueObject($userId),
            new GalleryIdValueObject($galleryId)
        );
    }
}
