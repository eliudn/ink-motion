<?php

namespace Src\Application\MediaRepositories\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;

use Illuminate\Http\Request;
use Src\Application\MediaRepositories\Application\Store\RepositoryStoreUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

final class RepositoryStoreController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly RepositoryStoreUseCase $repositoryStoreUseCase
    )
    {
    }

    /**
     * @param string $userId
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(string $userId, Request $request): JsonResponse
    {

       return $this->jsonResponse(
           $this->ok(),
           false,
           $this->repositoryStoreUseCase->__invoke($userId, $request)->entity()
       );
    }
}
