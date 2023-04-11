<?php

namespace Src\Shared\Infrastructure\Middleware;

use Closure;
use Illuminate\Http\Request;
use Src\Application\User\Application\Auth\CheckSuperAdminUseCase;
use Src\Application\User\Application\Auth\UserAuthUseCase;
use Src\Application\User\Application\Get\UserShowUseCase;
use Src\Shared\Infrastructure\Exceptions\AuthException;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

class UserMiddleware
{
    use HttpCodeHelper;

    public function __construct(
            private readonly UserAuthUseCase $userAuthUseCase,
            private readonly CheckSuperAdminUseCase $checkSuperAdminUseCase,
            private readonly UserShowUseCase $userShowUseCase
    )
    {
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws AuthException
     */
    public function handle(
        Request $request,
        Closure $next,

    ): mixed
    {
        if (empty($request->header('authentication'))) {
            throw new AuthException("Not jwt auth", $this->badRequest());
        }
        $userId = explode('/',$request->path())[3];
        $check = $this->userAuthUseCase->__invoke(
            $request->header('authentication'),
            $userId
        );

        $user = $this->userShowUseCase->__invoke($userId);

        $checkSuperAdmin = $this->checkSuperAdminUseCase->__invoke( $request->header('authentication'));

        if ($checkSuperAdmin){
            return $next($request);
        }

        if (!$check) {
            throw new AuthException("User is not valid", $this->unauthorized());
        }

        return $next($request);
    }


}
