<?php

namespace Src\Application\MediaRepositorySeasons\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\Application\MediaRepositorySeasons\Application\Store\SeasonStoreUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

class SeasonStoreController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly SeasonStoreUseCase $seasonStoreUseCase
    )
    {
    }
    public function __invoke(string $repositoryId, Request $request)
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->seasonStoreUseCase->__invoke($repositoryId, $request->toArray())->entity()
        );
    }

}
