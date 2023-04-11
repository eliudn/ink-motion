<?php

namespace Src\Application\FileUser\Infrastructure\Controllers;

use Src\Application\FileUser\Application\Get\FileUserShowUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;
use Src\Shared\Infrastructure\Middleware\UserMiddleware;

final class FileUserShowController extends CustomController
{
    use HttpCodeHelper;

    public function __construct(
        private readonly FileUserShowUseCase $fileUserShowUseCase
    )
    {
        $this->middleware(RoleMiddleware::class,[
            'role'=>'*'
        ]);
        $this->middleware(UserMiddleware::class);
    }
    public function __invoke(string $userId, string $fileUserId)
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->fileUserShowUseCase->__invoke($userId, $fileUserId)->entity()
        );
    }
}
