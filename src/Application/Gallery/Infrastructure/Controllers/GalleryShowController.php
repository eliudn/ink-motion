<?php

namespace Src\Application\Gallery\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Src\Application\Gallery\Application\Get\GalleryShowUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;
use Src\Shared\Infrastructure\Middleware\UserMiddleware;

final class GalleryShowController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly GalleryShowUseCase $galleryShowUseCase
    )
    {
        $this->middleware(RoleMiddleware::class,[
            'role'=>'*'
        ]);
        $this->middleware(UserMiddleware::class);
    }

    public function __invoke(string $userId):JsonResponse
    {
        return  $this->jsonResponse(
            $this->ok(),
            false,
            $this->galleryShowUseCase->__invoke($userId)->entity()
        );
    }
}
