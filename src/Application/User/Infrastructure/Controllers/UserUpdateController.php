<?php

namespace Src\Application\User\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Application\User\Application\Update\UserUpdateUseCase;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;
use Src\Shared\Infrastructure\Middleware\UserMiddleware;

class UserUpdateController extends \Src\Shared\Infrastructure\Controllers\CustomController
{
    use HttpCodeHelper;

    public function __construct(
        private readonly UserUpdateUseCase $userUpdateUseCase
    )
    {
        $this->middleware(UserMiddleware::class);
    }
    public function __invoke(Request $request, string $userId): JsonResponse
    {
       return $this->jsonResponse(
           $this->ok(),
           false,
           $this->userUpdateUseCase->__invoke($request->toArray(), $userId)->entity()
       );
    }
}
