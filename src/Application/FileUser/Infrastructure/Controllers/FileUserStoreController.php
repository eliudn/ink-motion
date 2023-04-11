<?php

namespace Src\Application\FileUser\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\Application\FileUser\Application\Store\FileUserSavingUseCase;
use Src\Application\FileUser\Application\Store\FileUserStoreUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;
use Src\Shared\Infrastructure\Middleware\UserMiddleware;

final class FileUserStoreController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
      //  private readonly FileUserStoreUseCase $fileUserStoreUseCase
        private  readonly FileUserSavingUseCase $fileUserSavingUseCase
    )
    {
        $this->middleware(RoleMiddleware::class,[
            'role'=>'*'
        ]);
        $this->middleware(UserMiddleware::class);
    }
    public function __invoke(Request $request, string $userId)
    {

        return $this->jsonResponse(
            $this->created(),
            false,
            $this->fileUserSavingUseCase->__invoke($request->file(), $userId)
        );
    }
}
