<?php

namespace Src\Application\MediaRepositories\Application\Update;


use Src\Application\MediaRepositories\Domain\Contracts\MediaRepositoryRepositoryContract;
use Src\Application\MediaRepositories\Domain\MediaRepositoryEntity;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryStatusValueObject;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

class RepositoryUpdateStatusUseCase
{

    public function __construct(
        private readonly MediaRepositoryRepositoryContract $mediaRepositoryRepositoryContract

    )
    {
    }
    public function __invoke(string $userId, string $repositoryId, array $request): MediaRepositoryEntity
    {

        return $this->mediaRepositoryRepositoryContract->updateStatus(
            new UserIdValueObject($userId),
            new RepositoryIdValueObject($repositoryId),
            new RepositoryStatusValueObject($request["status"])
        );
    }
}
