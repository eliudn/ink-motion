<?php

namespace Src\Application\Gallery\Application\Get;

use Src\Application\Gallery\Domain\Contract\GalleryRepositoryContract;
use Src\Application\Gallery\Domain\GalleryEntity;
use Src\Application\Gallery\Domain\ValueObjects\GalleryIdValueObject;

class GalleryShowGalleryIdUseCase
{
    public function __construct(
        private readonly GalleryRepositoryContract $galleryRepositoryContract
    )
    {
    }
    public function __invoke(int $galleryId): GalleryEntity
    {
    return $this->galleryRepositoryContract->showGalleryId(
        new GalleryIdValueObject($galleryId)
    );
    }
}
