<?php

namespace Src\Application\FileUser\Infrastructure\Controllers;

use Src\Application\FileUser\Application\Get\FileUserIndexUserIdUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

final class FileUserIndexController extends CustomController
{
    use HttpCodeHelper;

    public function __construct(
        private readonly FileUserIndexUserIdUseCase $fileUserIndexUserIdUseCase
    )
    {
    }

    public function __invoke(string $userId)
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->fileUserIndexUserIdUseCase->__invoke($userId)->entity()
        );
    }
}
