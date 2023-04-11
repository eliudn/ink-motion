<?php

namespace Src\Application\FileUser\Application\Delete;

use Src\Application\FileUser\Domain\Contracts\FileUserRepositoryContract;
use Src\Application\FileUser\Domain\ValueObjects\FileUserIdValueObject;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

class FileUserDeleteUseCase
{

    public function __construct(
        private readonly FileUserRepositoryContract $fileUserRepositoryContract
    )
    {
    }

    public function __invoke(string $userId, string $fileUserId)
    {
       return $this->fileUserRepositoryContract->delete(
           new UserIdValueObject($userId),
           new FileUserIdValueObject($fileUserId)
       );
    }
}
