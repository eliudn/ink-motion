<?php

namespace Src\Application\FileUser\Infrastructure\Controllers;

use Src\Application\FileUser\Application\Get\FileUserShowUserIdUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

class FileUserShowUserIdController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly FileUserShowUserIdUseCase $fileUserShowUserIdUseCase
    )
    {
    }

    public function __invoke(string $userId)
    {
       return $this->jsonResponse(
           $this->ok(),
           false,
           $this->fileUserShowUserIdUseCase->__invoke($userId)->entity()
       );
    }
}
