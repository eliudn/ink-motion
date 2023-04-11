<?php

namespace Src\Management\Login\Infrastructure\Repositories\Eloquent;

use Src\Management\Login\Domain\Contracts\LoginRepositoryContract;
use Src\Management\Login\Domain\Login;
use Src\Management\Login\Domain\ValueObject\LoginAuthenticationValueObject;
use Src\Management\Login\Infrastructure\Repositories\Eloquent\User as Model;

class LoginRepository implements LoginRepositoryContract
{
    private  $model ;
    public function __construct( Model $model )
    {
        $this->model =$model;
    }

    public function login(LoginAuthenticationValueObject $loginAuthenticationValueObject): Login
    {

        $user = $this->userByEmailOrNickname($loginAuthenticationValueObject->value()["nickname_or_email"]);
        if (!$user)
        {
            return  new  Login(null, 'USER_OR_PASSWORD_INCORRECT');
        }
        $check = $loginAuthenticationValueObject->checkPassword(
                        $loginAuthenticationValueObject->value()["password"],
                        $user["password"]
                    );

        if(!$check)
        {
            return new Login(null, 'USER_OR_PASSWORD_INCORRECT');
        }
        return  new Login($user);
    }

    private function userByEmailOrNickname(string $emailOrNickname)
    {
        $user =$this->model
            ->with('roles')
            ->where('email',$emailOrNickname)
            ->orWhere('nick_name',$emailOrNickname)
            ->select(
                'id',
                'email',
                'nick_name',
                'password'
            )->first();
        return $user?->makeVisible('password')->toArray();
    }
}
