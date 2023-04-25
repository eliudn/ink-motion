<?php

namespace Src\Application\MediaRepositories\Domain\Contracts;

use Src\Application\MediaRepositories\Domain\MediaRepositoryEntity;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryStatusValueObject;

interface MediaRepositoryValidationContract
{

    /**
     * @param RepositoryStatusValueObject $repositoryStatusValueObject
     * @return MediaRepositoryEntity
     */
    public function checkStatus(RepositoryStatusValueObject $repositoryStatusValueObject):MediaRepositoryEntity;
}
