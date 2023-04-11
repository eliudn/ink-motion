<?php

namespace Src\Application\User\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\Application\User\Application\Destroy\UserDestroyUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

class UserDestroyController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly UserDestroyUseCase $userDestroyUseCase
    )
    {
    }
    public function __invoke(string $userId)
    {
        return $this->jsonResponse(
            $this->accepted(),
            false,
            $this->userDestroyUseCase->__invoke($userId)->entity()
        );
    }
}
