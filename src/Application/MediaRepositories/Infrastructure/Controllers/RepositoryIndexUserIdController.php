<?php

namespace Src\Application\MediaRepositories\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Src\Application\MediaRepositories\Application\Get\RepositoryIndexUserIdUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

final class RepositoryIndexUserIdController extends CustomController
{

    use HttpCodeHelper;
    public function __construct(
        private readonly RepositoryIndexUserIdUseCase $repositoryIndexUserIdUseCase
    )
    {
    }
    public function __invoke(string $userId): JsonResponse
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->repositoryIndexUserIdUseCase->__invoke($userId)->entity()
        );
    }
}
