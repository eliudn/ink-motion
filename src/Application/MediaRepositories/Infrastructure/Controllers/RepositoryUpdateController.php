<?php

namespace Src\Application\MediaRepositories\Infrastructure\Controllers;



use Illuminate\Http\Request;
use Src\Application\MediaRepositories\Application\Update\RepositoryUpdateUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

final class RepositoryUpdateController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
       private readonly RepositoryUpdateUseCase $repositoryUpdateUseCase
    )
    {
    }
    public function __invoke(Request $request, string $userId, string $repositoryId)
    {

      return $this->jsonResponse(
          $this->ok(),
          false,
          $this->repositoryUpdateUseCase->__invoke($userId,$repositoryId,$request->toArray())->entity()
      );
    }
}
