<?php

namespace Src\Application\MediaRepositorySeasons\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Application\MediaRepositorySeasons\Application\Update\SeasonUpdateStatusUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

final class SeasonUpdateStatusController extends CustomController
{
    use HttpCodeHelper;

    public function __construct(
        private readonly SeasonUpdateStatusUseCase $seasonUpdateStatusUseCase
    )
    {
    }

    public function __invoke(string$userId, $repositoryId,string $seasonId, Request $request): JsonResponse
    {
       return $this->jsonResponse(
           $this->ok(),
           false,
           $this->seasonUpdateStatusUseCase->__invoke($seasonId, $request->toArray())->handler()
       );
    }
}
