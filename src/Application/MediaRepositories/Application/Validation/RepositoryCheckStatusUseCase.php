<?php

namespace Src\Application\MediaRepositories\Application\Validation;

use http\Client\Curl\User;
use Src\Application\MediaRepositories\Domain\Contracts\MediaRepositoryRepositoryContract;
use Src\Application\MediaRepositories\Domain\Contracts\MediaRepositoryValidationContract;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryStatusValueObject;
use Src\Application\MediaRepositories\Infrastructure\Repositories\Eloquent\MediaRepositoryValidation;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

final class RepositoryCheckStatusUseCase
{

    public function __construct(
        private readonly MediaRepositoryRepositoryContract $mediaRepositoryRepositoryContract,
        private readonly MediaRepositoryValidationContract $mediaRepositoryValidationContract
    )
    {
    }
    public function __invoke(string $userId,string $repositoryId ): void
    {
        $this->mediaRepositoryValidationContract->checkStatus(
            new RepositoryStatusValueObject($this->status($userId,$repositoryId))
        );
    }

    private function status(string $userId,string $repositoryId):string
    {
        return $this->mediaRepositoryRepositoryContract->show(
            new UserIdValueObject($userId),
            new RepositoryIdValueObject($repositoryId)
        )->entity()["status"];
    }

}
