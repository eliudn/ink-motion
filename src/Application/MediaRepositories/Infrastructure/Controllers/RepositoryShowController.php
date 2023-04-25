<?php

namespace Src\Application\MediaRepositories\Infrastructure\Controllers;

use Src\Application\MediaRepositories\Application\Get\RepositoryShowUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

final class RepositoryShowController extends CustomController
{
    use HttpCodeHelper;

    public function __construct(
        private readonly RepositoryShowUseCase $repositoryShowUseCase
    )
    {
    }
    public function __invoke(string $userId, string $repositoryId)
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->repositoryShowUseCase->__invoke($userId,$repositoryId)->handle()
        );
    }
}
