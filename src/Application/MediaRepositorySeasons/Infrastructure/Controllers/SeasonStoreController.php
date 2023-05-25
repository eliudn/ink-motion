<?php

namespace Src\Application\MediaRepositorySeasons\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Application\MediaRepositorySeasons\Application\Store\SeasonStoreUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

final class SeasonStoreController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly SeasonStoreUseCase $seasonStoreUseCase
    )
    {
    }
    public function __invoke(string $userId, string $repositoryId): JsonResponse
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->seasonStoreUseCase->__invoke($userId, $repositoryId)->handler()
        );
    }

}
