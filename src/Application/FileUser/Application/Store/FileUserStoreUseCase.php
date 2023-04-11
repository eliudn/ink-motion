<?php

namespace Src\Application\FileUser\Application\Store;

use Src\Application\FileUser\Domain\Contracts\FileUserRepositoryContract;
use Src\Application\FileUser\Domain\FileUserEntity;
use Src\Application\FileUser\Domain\ValueObjects\FileUserStoreValueObject;

final class FileUserStoreUseCase
{
    public function __construct(
       private readonly FileUserRepositoryContract $fileUserRepositoryContract
    )
    {
    }

    /**
     * @param array $request
     * @return FileUserEntity
     */
    public function __invoke(array $request): FileUserEntity
    {
        return $this->fileUserRepositoryContract->store(
             new FileUserStoreValueObject($request)
         );
    }
}
