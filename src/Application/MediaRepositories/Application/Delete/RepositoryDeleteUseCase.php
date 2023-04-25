<?php

namespace Src\Application\MediaRepositories\Application\Delete;

use Src\Application\MediaRepositories\Domain\Contracts\MediaRepositoryRepositoryContract;
use Src\Application\MediaRepositories\Domain\MediaRepositoryEntity;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

final class RepositoryDeleteUseCase
{
    public function __construct(
        private readonly MediaRepositoryRepositoryContract $mediaRepositoryRepositoryContract
    )
    {
    }
    public function __invoke(string $userId, string $repositoryId): MediaRepositoryEntity
    {

        return $this->mediaRepositoryRepositoryContract->delete(
            new UserIdValueObject($userId),
            new RepositoryIdValueObject($repositoryId)
        );
    }
}
