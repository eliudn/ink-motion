<?php

namespace Src\Application\User\Infrastructure\Repositories\Eloquent;

use Src\Application\User\Domain\Contracts\UserAuthRepositoriesContract;
use Src\Application\User\Domain\User;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;
Use Src\Application\User\Infrastructure\Repositories\Eloquent\User as Model;

class UserAuthRepositories implements UserAuthRepositoriesContract
{
    private $model;
    public function __construct()
    {
        $this->model = new Model();
    }

    public function getUseRole(UserIdValueObject $userIdValueObject): User
    {
        $user = $this->model
            ->with('roles')
            ->where('id', $userIdValueObject->value())
            ->select(
                'id',
                'email',
                'nick_name'
            )->get();
        return new User($user->toArray());
    }
}
