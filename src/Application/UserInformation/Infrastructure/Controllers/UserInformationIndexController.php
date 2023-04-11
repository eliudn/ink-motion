<?php

namespace Src\Application\UserInformation\Infrastructure\Controllers;

use Src\Application\UserInformation\Application\Get\UserInformationIndexUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;

class UserInformationIndexController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly UserInformationIndexUseCase $userInformationIndexUseCase
    )
    {

        $this->middleware(RoleMiddleware::class,[
            'roles'=>'super_admin'
        ]);
    }

    public function __invoke()
    {
       return $this->jsonResponse(
           $this->ok(),
           false,
           $this->userInformationIndexUseCase->__invoke()->entity()
       );
    }
}
