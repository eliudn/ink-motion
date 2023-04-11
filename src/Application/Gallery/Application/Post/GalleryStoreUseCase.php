<?php

namespace Src\Application\Gallery\Application\Post;

use Src\Application\Gallery\Domain\Contract\GalleryRepositoryContract;
use Src\Application\Gallery\Domain\GalleryEntity;
use Src\Application\Gallery\Domain\ValueObjects\GalleryStoreValueObject;
use Src\Application\Gallery\Infrastructure\Repositories\Eloquent\GalleryRepository;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

class GalleryStoreUseCase
{

    public function __construct(
        private readonly GalleryRepositoryContract $galleryRepositoryContract
    )
    {
    }

    public function __invoke(array $request, string $userid):GalleryEntity
    {
        return $this->galleryRepositoryContract->store(
            new GalleryStoreValueObject($request),
            new UserIdValueObject($userid)
        );
    }
}
