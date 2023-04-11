<?php

namespace Src\Application\User\Application\Store;

use Src\Application\User\Domain\Contracts\UserRepositoryContract;
use Src\Application\User\Domain\ValueObjects\UserStoreValueObject;

class UserStoreUseCase
{
    public function __construct(
        private readonly UserRepositoryContract $userRepositoryContract
    )
    {
    }
    public function __invoke(array $request)
    {

       return $this->userRepositoryContract->store(new UserStoreValueObject($request));
    }
}
