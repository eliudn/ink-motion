<?php

namespace Src\Application\FileUser\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Src\Application\FileUser\Application\Delete\FileUserDeleteUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

final class FileUserDestroyController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly FileUserDeleteUseCase $fileUserDeleteUseCase
    )
    {
    }

    public function __invoke(string $userId, string $fileUserId): JsonResponse
    {
        return $this->jsonResponse(
            $this->accepted(),
            false,
            $this->fileUserDeleteUseCase->__invoke( $userId, $fileUserId)->entity()
        );


    }

}
