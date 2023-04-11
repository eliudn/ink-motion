<?php

namespace Src\Application\User\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Application\User\Application\Get\UserShowUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;
use Src\Shared\Infrastructure\Middleware\UserMiddleware;

class UserShowController extends CustomController
{
    use HttpCodeHelper;

    public function __construct(
        private readonly UserShowUseCase $userShowUseCase,

    )
    {
        $this->middleware(RoleMiddleware::class,[
            'role'=>'*'
        ]);
        $this->middleware(UserMiddleware::class);
    }

    /**
     * @param Request $request
     * @param string $userId
     * @return JsonResponse
     */
    public function __invoke(Request $request, string $userId): JsonResponse
    {

        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->userShowUseCase->__invoke($userId)->entity()
        );

    }
}
