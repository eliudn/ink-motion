<?php

namespace Src\Application\FileUser\Application\Get;

use Src\Application\FileUser\Domain\Contracts\FileUserRepositoryContract;
use Src\Application\FileUser\Domain\FileUserEntity;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

class FileUserIndexUserIdUseCase
{
    public function __construct(
        private readonly FileUserRepositoryContract $fileUserRepositoryContract
    )
    {
    }

    public function __invoke(string $userId): FileUserEntity
    {
        return $this->fileUserRepositoryContract->index(
            new UserIdValueObject($userId)
        );
    }

}
