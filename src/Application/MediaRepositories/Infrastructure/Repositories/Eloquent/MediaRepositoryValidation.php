<?php

namespace Src\Application\MediaRepositories\Infrastructure\Repositories\Eloquent;

use Src\Application\MediaRepositories\Domain\Contracts\MediaRepositoryValidationContract;
use Src\Application\MediaRepositories\Domain\MediaRepositoryEntity;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryStatusValueObject;
use Src\Application\MediaRepositories\Infrastructure\Enum\Status;

final class MediaRepositoryValidation implements MediaRepositoryValidationContract
{

    /**
     * @inheritDoc
     */
    public function checkStatus(RepositoryStatusValueObject $repositoryStatusValueObject): MediaRepositoryEntity
    {
        if($repositoryStatusValueObject->value() === Status::FINALIZED->value or $repositoryStatusValueObject->value() === Status::CANCELLED->value)
        {
            return  new MediaRepositoryEntity(null, 'REPOSITORY_FINALIZED_OR_CANCELLED');
        }
       return new MediaRepositoryEntity(null,null);
    }
}
