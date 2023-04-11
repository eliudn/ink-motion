<?php

namespace Src\Application\User\Domain\Contracts;

use Src\Application\User\Domain\User;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

interface UserAuthRepositoriesContract
{
    public function getUseRole(UserIdValueObject $userIdValueObject):User;
}
