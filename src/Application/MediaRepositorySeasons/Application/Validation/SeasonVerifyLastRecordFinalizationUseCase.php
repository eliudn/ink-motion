<?php

namespace Src\Application\MediaRepositorySeasons\Application\Validation;

use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\MediaRepositorySeasons\Domain\Contracts\SeasonValidationContract;

class SeasonVerifyLastRecordFinalizationUseCase
{
    public function __construct(
        private readonly SeasonValidationContract $seasonValidationContract
    )
    {
    }

    public function __invoke(string $repositoryId):void
    {
        $this->seasonValidationContract->verifyLastRecordFinalization(
            new RepositoryIdValueObject($repositoryId)
        );
    }
}
