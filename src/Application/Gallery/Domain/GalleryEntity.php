<?php

namespace Src\Application\Gallery\Domain;

use Src\Application\Gallery\Domain\Exceptions\GalleryNotFoundException;
use Src\Shared\Domain\Helper\HttpCodesDomainHelper;

class GalleryEntity extends \Src\Shared\Domain\Domain
{
    use HttpCodesDomainHelper;
    private const GALLERY_NOT_FOUND ="GALLERY_NOT_FOUND";

    /**
     * @inheritDoc
     */
    protected function isException(?string $exception): void
    {
        if (!is_null($exception)) {
            match ($exception) {
                self::GALLERY_NOT_FOUND=> throw new GalleryNotFoundException("Gallery not found", $this->notFound())
            };
        }
    }


}
