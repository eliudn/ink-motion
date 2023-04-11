<?php

namespace Src\Application\User\Infrastructure\Controllers;

use Src\Application\User\Application\Get\UserIndexUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;

class UserIndexController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly UserIndexUseCase $userIndexUseCase
    )
    {
        $this->middleware(RoleMiddleware::class,
            [
                'role'=>'super_admin'
            ]

        );
    }
    public function __invoke()
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->userIndexUseCase->__invoke()->entity()
        );

    }
}
