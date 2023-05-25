<?php

namespace Src\Application\MediaRepositorySeasons\Domain\Contracts;

use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\MediaRepositorySeasons\Domain\SeasonEntity;

interface SeasonValidationContract
{
    public function verifyLastRecordFinalization(RepositoryIdValueObject $repositoryIdValueObject):SeasonEntity;
}
