<?php

namespace Src\Application\FileUser\Application\Get;

use Src\Application\FileUser\Domain\Contracts\FileUserRepositoryContract;
use Src\Application\FileUser\Domain\FileUserEntity;
use Src\Application\FileUser\Domain\ValueObjects\FileUserIdValueObject;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;
use Src\Management\FileHandling\Application\Get\FileShowUseCase;

class FileUserShowUseCase
{
    public function __construct(
        private readonly FileUserRepositoryContract $fileUserRepositoryContract,
        private readonly FileShowUseCase $fileShowUseCase
    )
    {
    }

    public function __invoke(string $userId, string $fileUserId):FileUserEntity
    {
        $file = $this->fileUserRepositoryContract->show(
            new UserIdValueObject($userId),
            new FileUserIdValueObject($fileUserId)
        );
        $url =$this->fileShowUseCase->__invoke($file->entity())->entity();
        return new FileUserEntity(array_merge($file->handle(),["url"=>$url]));
    }
}
