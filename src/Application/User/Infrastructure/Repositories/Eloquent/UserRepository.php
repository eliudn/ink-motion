<?php

namespace Src\Application\User\Infrastructure\Repositories\Eloquent;

use PhpParser\Node\Expr\AssignOp\Mod;
use Src\Application\User\Domain\Contracts\UserRepositoryContract;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;
use Src\Application\User\Domain\ValueObjects\UserStoreValueObject;
use Src\Application\User\Domain\ValueObjects\UserUpdateValueObject;
use Src\Application\User\Infrastructure\Repositories\Eloquent\User as Model;
use Src\Application\User\Domain\User;
use function PHPUnit\Framework\isEmpty;

class UserRepository implements UserRepositoryContract
{
    private $model;
    public function __construct(

    )
    {
        $this->model = new Model();
    }

    /**
     * @return User
     */
    public function index(): User
    {
        $user = $this->model->all();

      return new User($user->toArray());
    }

    /**
     * @param UserIdValueObject $userId
     * @return User
     */
    public function show(UserIdValueObject $userId): User
    {

        $user = $this->model->where('id',$userId->value())->first();

        if(is_null($user) )
        {
            return new User(null, 'USER_NOT_FOUND');
        }
        return new User($user->toArray());
    }

    /**
     * @param UserStoreValueObject $userStore
     * @return User
     */
    public function store(UserStoreValueObject $userStore): User
    {
       // dd($this->intId());
        //dd($userStore->value());
        $user = $this->model->create(
            [
                "nick_name"=>$userStore->handler()["nickname"],
                "int_id"=>$this->intId(),
                "email"=>$userStore->handler()["email"],
                "state_id"=>2,
                "password"=>$userStore->handler()["password"],
            ]
        );
        if(!$user){
            return new User(null, 'USER_STORE_FAILED');
        }


        return new User($user->toArray());
    }

    /**
     * @param UserUpdateValueObject $userUpdate
     * @param UserIdValueObject $userId
     * @return User
     */
    public function update(UserUpdateValueObject $userUpdate, UserIdValueObject $userId): User
    {
        $user=$this->model->find($userId->value());
        if(is_null($user))
        {
            return new User(null, 'USER_NOT_FOUND');
        }
        $user->update([
            'nick_name'=>$userUpdate->value()["nickname"],
            'email'=>$userUpdate->value()['email']
        ]);

        return new User($user->toArray());
    }

    public function destroy(UserIdValueObject $userId): User
    {
        $user = $this->model->find($userId->value());
        if(is_null($user))
        {
            return new User(null, 'USER_NOT_FOUND');
        }
        $user->delete();
        return new User($user->id);
    }

    /**
     * @return int
     */
    private function intId():int
    {
        $value = $this->model
            ->where('int_id','>',0)
            ->orderBy('int_id', 'desc')
            ->select('int_id')
            ->first();
        return $value->int_id+1;
    }


}
