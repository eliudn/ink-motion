<?php

namespace Src\Application\Gallery\Application\Get;

use Src\Application\Gallery\Domain\Contract\GalleryRepositoryContract;
use Src\Application\Gallery\Domain\GalleryEntity;

class GalleryIndexUseCase
{
    public function __construct(
        private readonly GalleryRepositoryContract $galleryRepositoryContract
    )
    {
    }

    public function __invoke():GalleryEntity
    {
       return $this->galleryRepositoryContract->index();
    }
}
