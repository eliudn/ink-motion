<?php

namespace Src\Application\Gallery\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Src\Application\Gallery\Application\Destroy\GalleryDestroyUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;
use Src\Shared\Infrastructure\Middleware\UserMiddleware;

final class GalleryDestroyController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly GalleryDestroyUseCase $galleryDestroyUseCase
    )
    {
        $this->middleware(RoleMiddleware::class,['role'=>'*']);
        $this->middleware(UserMiddleware::class);
    }

    public function __invoke(string $userId, int $galleryId): JsonResponse
    {
        return $this->jsonResponse(
            $this->accepted(),
            false,
            $this->galleryDestroyUseCase->__invoke($userId, $galleryId)->entity()
        );
    }
}
