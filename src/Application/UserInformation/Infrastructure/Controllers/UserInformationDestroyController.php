<?php

namespace Src\Application\UserInformation\Infrastructure\Controllers;

use Src\Application\UserInformation\Application\Delete\UserInformationDestroyUseCase;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;
use Src\Shared\Infrastructure\Middleware\UserMiddleware;

class UserInformationDestroyController extends \Src\Shared\Infrastructure\Controllers\CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly UserInformationDestroyUseCase $userInformationDestroyUseCase
    )
    {
        $this->middleware(RoleMiddleware::class,[
            'roles'=>'*'
        ]);
        $this->middleware(UserMiddleware::class);
    }

    public function __invoke(string $userId)
    {
        return $this->jsonResponse(
            $this->accepted(),
            false,
            $this->userInformationDestroyUseCase->__invoke($userId)->entity()
        );
    }
}
