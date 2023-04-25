<?php

namespace Src\Application\MediaRepositories\Application\Update;

use Src\Application\FileUser\Application\Store\FileUserSavingUseCase;
use Src\Application\FileUser\Domain\ValueObjects\FileUserIdValueObject;
use Src\Application\MediaRepositories\Domain\Contracts\MediaRepositoryRepositoryContract;
use Src\Application\MediaRepositories\Domain\MediaRepositoryEntity;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

final class RepositoryUpdateImageUseCase
{

    public function __construct(
        private readonly MediaRepositoryRepositoryContract $mediaRepositoryRepositoryContract,
        private readonly FileUserSavingUseCase $fileUserSavingUseCase
    )
    {
    }
    public function __invoke(string $userId, string $repositoryId, object $request): MediaRepositoryEntity
    {

        $fileId = $this->addFile($userId, $request->file());

        return $this->updateImage($userId,$repositoryId,$fileId);
    }

    private function updateImage(string $userId, string $repositoryId, string $fileId): MediaRepositoryEntity
    {
        return $this->mediaRepositoryRepositoryContract->updateImage(
            new UserIdValueObject($userId),
            new RepositoryIdValueObject($repositoryId),
            new FileUserIdValueObject($fileId)
        );
    }

    private function addFile(string $userId, array $request):string
    {
        return    array_map(
            fn($file)=>$file["id"],
            $this->fileUserSavingUseCase->__invoke($request,$userId, null)
        )["file"];
    }
}
