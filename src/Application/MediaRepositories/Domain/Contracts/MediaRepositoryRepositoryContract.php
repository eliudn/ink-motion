<?php

namespace Src\Application\MediaRepositories\Domain\Contracts;

use Src\Application\FileUser\Domain\ValueObjects\FileUserIdValueObject;
use Src\Application\MediaRepositories\Domain\MediaRepositoryEntity;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryStatusValueObject;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryValueObject;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

interface MediaRepositoryRepositoryContract {

    /**
     * @param UserIdValueObject $userIdValueObject
     * @return MediaRepositoryEntity
     */
    public function index(UserIdValueObject $userIdValueObject): MediaRepositoryEntity;

    /**
     * @param UserIdValueObject $userIdValueObject
     * @param RepositoryIdValueObject $idValueObject
     * @return MediaRepositoryEntity
     */
    public function show(UserIdValueObject $userIdValueObject, RepositoryIdValueObject $idValueObject):MediaRepositoryEntity;

    /**
     * @param UserIdValueObject $userIdValueObject
     * @param RepositoryIdValueObject $idValueObject
     * @param RepositoryValueObject $repositoryValueObject
     * @return MediaRepositoryEntity
     */
    public  function update(UserIdValueObject $userIdValueObject,
                            RepositoryIdValueObject $idValueObject,
                            RepositoryValueObject $repositoryValueObject):MediaRepositoryEntity;

    /**
     * @param UserIdValueObject $userIdValueObject
     * @param RepositoryIdValueObject $idValueObject
     * @return MediaRepositoryEntity
     */
    public  function delete(UserIdValueObject $userIdValueObject, RepositoryIdValueObject $idValueObject):MediaRepositoryEntity;

    /**
     * @param UserIdValueObject $userIdValueObject
     * @param RepositoryValueObject $repositoryValueObject
     * @return MediaRepositoryEntity
     */
    public  function store(UserIdValueObject $userIdValueObject, RepositoryValueObject $repositoryValueObject):MediaRepositoryEntity;

    /**
     * @param UserIdValueObject $userIdValueObject
     * @param RepositoryIdValueObject $repositoryIdValueObject
     * @param FileUserIdValueObject $fileUserIdValueObject
     * @return MediaRepositoryEntity
     */
    public  function updateImage(
        UserIdValueObject $userIdValueObject,
        RepositoryIdValueObject $repositoryIdValueObject,
        FileUserIdValueObject $fileUserIdValueObject
    ): MediaRepositoryEntity;

    public function updateStatus(
        UserIdValueObject $userIdValueObject,
        RepositoryIdValueObject $repositoryIdValueObject,
        RepositoryStatusValueObject $repositoryStatusValueObject
    ):MediaRepositoryEntity;


}
