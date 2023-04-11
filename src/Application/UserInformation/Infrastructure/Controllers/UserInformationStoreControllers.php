<?php

namespace Src\Application\UserInformation\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Application\UserInformation\Application\Store\UserInformationStoreUseCase;
use Src\Application\UserInformation\Infrastructure\Requests\UserInformationRequest;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;
use Src\Shared\Infrastructure\Middleware\UserMiddleware;

class UserInformationStoreControllers extends CustomController
{
    use HttpCodeHelper;

    public function __construct(
        private readonly UserInformationStoreUseCase $userInformationStoreUseCase
    )
    {
        $this->middleware(UserMiddleware::class);
    }

    /**
     * @param Request $request
     * @param string $userId
     * @return JsonResponse
     */
    public function __invoke(UserInformationRequest $request, string $userId): JsonResponse
    {
        return $this->jsonResponse(
            $this->created(),
            false,
            $this->userInformationStoreUseCase->__invoke(
                $request->toArray(),
                $userId
            )->entity()
        );
    }

}
