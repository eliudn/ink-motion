<?php

namespace Src\Application\UserInformation\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\Application\UserInformation\Application\Update\UserInformationUpdateUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;
use Src\Shared\Infrastructure\Middleware\UserMiddleware;

class UserInformationUpdateController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly UserInformationUpdateUseCase $userInformationUpdateUseCase
    )
    {
        $this->middleware(RoleMiddleware::class,[
            'roles'=>'*'
        ]);
        $this->middleware(UserMiddleware::class);
    }

    public function __invoke(Request $request, string $userId)
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->userInformationUpdateUseCase->__invoke($request->toArray(),$userId)->entity()
        );
    }
}
