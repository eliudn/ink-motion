<?php

namespace Src\Application\GalleryFileUser\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\Application\GalleryFileUser\Application\store\GalleryFileAddUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

final class GalleryFileAddFileController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly GalleryFileAddUseCase $galleryFileAddUseCase
    )
    {
    }
    public function __invoke(string $userId, int $galleryId, Request $request)
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->galleryFileAddUseCase->__invoke($userId, $galleryId, $request->toArray())->entity()
        );
    }
}
