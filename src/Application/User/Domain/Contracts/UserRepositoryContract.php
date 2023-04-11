<?php

namespace Src\Application\User\Domain\Contracts;

use Src\Application\User\Domain\ValueObjects\UserIdValueObject;
use Src\Application\User\Domain\ValueObjects\UserStoreValueObject;
use Src\Application\User\Domain\ValueObjects\UserUpdateValueObject;
use Src\Application\User\Domain\User;

interface UserRepositoryContract
{

    /**
     * @return User
     */
    public function index():User;

    /**
     * @param UserIdValueObject $userId
     * @return User
     */
    public function show(UserIdValueObject $userId):User;

    /**
     * @param UserStoreValueObject $userstore
     * @return User
     */
    public function store(UserStoreValueObject $userStore):User;

    /**
     * @param UserUpdateValueObject $userUpdate
     * @param UserIdValueObject $userId
     * @return User
     */
    public function update(UserUpdateValueObject $userUpdate, UserIdValueObject $userId):User;

    /**
     * @param UserIdValueObject $UserId
     * @return User
     */
    public function destroy(UserIdValueObject $UserId):User;

}
