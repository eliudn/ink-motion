<?php

namespace Src\Management\Login\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Management\Login\Applications\Login\LoginAuthUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;

final class LoginAuthController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly LoginAuthUseCase $loginAuthUseCase
    )
    {/*
       $this->middleware(RoleMiddleware::class,
            [
                'role'=>'*'
            ]
        );*/
    }

    public function __invoke(Request $request):JsonResponse
    {

        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->loginAuthUseCase->__invoke($request->toArray())->entity()
        );
    }
}
