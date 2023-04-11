<?php

namespace Src\Application\FileUser\Domain\Contracts;

use Src\Application\FileUser\Domain\FileUserEntity;
use Src\Application\FileUser\Domain\ValueObjects\FileUserIdValueObject;
use Src\Application\FileUser\Domain\ValueObjects\FileUserStoreValueObject;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;


interface FileUserRepositoryContract
{

    /**
     * @param FileUserStoreValueObject $fileUserStoreValueObject
     * @return FileUserEntity
     */
    public function store(FileUserStoreValueObject $fileUserStoreValueObject ):FileUserEntity;

    public  function  index(UserIdValueObject $userIdValueObject):FileUserEntity;

    public function  show(UserIdValueObject $userIdValueObject, FileUserIdValueObject $fileUserIdValueObject):FileUserEntity;

    public function  delete(UserIdValueObject $userIdValueObject, FileUserIdValueObject $fileUserIdValueObject):FileUserEntity;
}
