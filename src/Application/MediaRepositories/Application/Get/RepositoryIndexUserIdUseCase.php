<?php

namespace Src\Application\MediaRepositories\Application\Get;

use Src\Application\MediaRepositories\Domain\Contracts\MediaRepositoryRepositoryContract;
use Src\Application\MediaRepositories\Domain\MediaRepositoryEntity;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

final class RepositoryIndexUserIdUseCase
{
    public function __construct(
        private readonly MediaRepositoryRepositoryContract $mediaRepositoryRepositoryContract
    )
    {
    }

    public function __invoke(string $userId): MediaRepositoryEntity
    {
        return $this->mediaRepositoryRepositoryContract->index(
            new UserIdValueObject($userId)
        );
    }
}
