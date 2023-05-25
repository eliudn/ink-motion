<?php

namespace Src\Application\MediaRepositories\Application\Validation;


use Src\Application\MediaRepositories\Application\Get\RepositoryShowUseCase;
use Src\Application\MediaRepositories\Domain\Contracts\MediaRepositoryRepositoryContract;
use Src\Application\MediaRepositories\Domain\Contracts\MediaRepositoryValidationContract;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryStatusValueObject;

use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

final class RepositoryCheckStatusUseCase
{

    public function __construct(
        private readonly MediaRepositoryValidationContract $mediaRepositoryValidationContract,
        private readonly RepositoryShowUseCase $repositoryShowUseCase
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
        return $this->repositoryShowUseCase->__invoke(
          $userId,$repositoryId
        )->entity()["status"]->value;
    }

}
