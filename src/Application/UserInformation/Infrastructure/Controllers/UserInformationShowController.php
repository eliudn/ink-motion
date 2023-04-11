<?php

namespace Src\Application\UserInformation\Infrastructure\Controllers;

use Src\Application\UserInformation\Application\Get\UserInformationShowUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

class UserInformationShowController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly UserInformationShowUseCase $userInformationShowUseCase
    )
    {
    }

    public function __invoke(string $userId)
    {

        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->userInformationShowUseCase->__invoke($userId, true)->handle()
        );
    }
}
