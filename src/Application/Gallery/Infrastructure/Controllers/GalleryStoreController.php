<?php

namespace Src\Application\Gallery\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\Application\Gallery\Application\Post\GalleryStoreUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;
use Src\Shared\Infrastructure\Middleware\UserMiddleware;

final class GalleryStoreController extends CustomController
{

    use HttpCodeHelper;
    public function __construct(
        private readonly GalleryStoreUseCase $galleryStoreUseCase
    )
    {
        $this->middleware(UserMiddleware::class);
    }

    public function __invoke(Request $request, string $userId)
    {
      return $this->jsonResponse(
          $this->created(),
          false,
          $this->galleryStoreUseCase->__invoke($request->toArray(), $userId)->entity()
      );
    }
}// $this->galleryStoreUseCase->__invoke($request->toArray(), $userId)->entity()
