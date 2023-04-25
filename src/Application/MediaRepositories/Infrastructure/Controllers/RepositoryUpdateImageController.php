<?php

namespace Src\Application\MediaRepositories\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Application\MediaRepositories\Application\Update\RepositoryUpdateImageUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

final class RepositoryUpdateImageController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly RepositoryUpdateImageUseCase $repositoryUpdateImageUseCase
    )
    {
    }

    public function __invoke(string $userId, string $repositoryId, Request $request): JsonResponse
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->repositoryUpdateImageUseCase->__invoke($userId,$repositoryId,$request)->entity()
        );
    }
}
