<?php

namespace Src\Application\MediaRepositories\Application\Update;

use Src\Application\MediaRepositories\Application\Validation\RepositoryCheckStatusUseCase;
use Src\Application\MediaRepositories\Domain\Contracts\MediaRepositoryRepositoryContract;
use Src\Application\MediaRepositories\Domain\MediaRepositoryEntity;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryValueObject;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

final class RepositoryUpdateUseCase
{

    public function __construct(
        private readonly MediaRepositoryRepositoryContract $mediaRepositoryRepositoryContract
    )
    {
    }

    /**
     * @param string $userId
     * @param string $repositoryId
     * @param array $request
     * @return MediaRepositoryEntity
     */
    public function __invoke(string $userId, string $repositoryId, array $request): MediaRepositoryEntity
    {

        return $this->mediaRepositoryRepositoryContract->update(
          new UserIdValueObject($userId),
          new RepositoryIdValueObject($repositoryId),
          new RepositoryValueObject($request)
        );
    }
}
