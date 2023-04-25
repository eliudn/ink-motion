<?php

namespace Src\Application\Gallery\Infrastructure\Controllers;

use Src\Application\Gallery\Application\Get\GalleryIndexUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;

class GalleryIndexController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly GalleryIndexUseCase $galleryIndexUseCase
    )
    {
        $this->middleware(RoleMiddleware::class,[
            'role'=>'super_admin'
        ]);
    }
    public function __invoke()
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->galleryIndexUseCase->__invoke()->entity()
        );
    }
}
