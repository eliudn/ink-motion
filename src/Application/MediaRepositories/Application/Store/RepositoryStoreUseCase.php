<?php

namespace Src\Application\MediaRepositories\Application\Store;

use Src\Application\FileUser\Application\Store\FileUserSavingUseCase;
use Src\Application\FileUser\Application\Store\FileUserStoreUseCase;
use Src\Application\MediaRepositories\Domain\Contracts\MediaRepositoryRepositoryContract;
use Src\Application\MediaRepositories\Domain\MediaRepositoryEntity;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryValueObject;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;
use Src\Management\FileHandling\Application\Store\FileStoreUseCase;

final class RepositoryStoreUseCase
{
    public function __construct(
        private readonly MediaRepositoryRepositoryContract $mediaRepositoryRepositoryContract,
        private readonly FileUserSavingUseCase $fileStoreUseCase
    )
    {
    }

    /**
     * @param string $userId
     * @param object $request
     * @return MediaRepositoryEntity
     */
    public function __invoke(string $userId, object $request): MediaRepositoryEntity
    {

        $file = $this->addFile($request, $userId);

        return $this->mediaRepositoryRepositoryContract->store(
            new UserIdValueObject($userId),
            new RepositoryValueObject($this->request($request->toArray(),$file))
        );
    }

    /**
     * @param object $request
     * @param string $userId
     * @return array
     */
    private function addFile(object $request,string $userId): array
    {
        return $this->fileStoreUseCase->__invoke($request->file(), $userId, 'file_repository');
    }

    /**
     * @param array $request
     * @param $fileId
     * @return array
     */
    private function request(array $request, $fileId): array
    {
        return array_merge($request,["fileId"=>$fileId["file"]["id"]?:null]);
    }

}
