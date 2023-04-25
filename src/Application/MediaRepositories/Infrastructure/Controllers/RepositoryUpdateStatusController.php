<?php

namespace Src\Application\MediaRepositories\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Application\MediaRepositories\Application\Update\RepositoryUpdateStatusUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

class RepositoryUpdateStatusController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly RepositoryUpdateStatusUseCase $repositoryUpdateStatusUseCase
    )
    {
    }
    public function __invoke(string $userId, string $repositoryId, Request $request): JsonResponse
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->repositoryUpdateStatusUseCase->__invoke($userId,$repositoryId,$request->toArray())->handle()
        );
    }
}
