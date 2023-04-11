<?php

namespace Src\Application\Gallery\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Application\Gallery\Application\Update\GalleryUpdateUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;
use Src\Shared\Infrastructure\Middleware\UserMiddleware;

final class GalleryUpdateController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly GalleryUpdateUseCase $galleryUpdateUseCase
    )
    {
        $this->middleware(RoleMiddleware::class,['role'=>'*']);
        $this->middleware(UserMiddleware::class);
    }

    public function __invoke(Request $request, string $userId, int $galleryId):JsonResponse
    {
       return $this->jsonResponse(
           $this->ok(),
           false,
           $this->galleryUpdateUseCase->__invoke($request->toArray(),$userId,$galleryId)->entity()
       );
    }
}
