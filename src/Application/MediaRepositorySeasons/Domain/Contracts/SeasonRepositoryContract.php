<?php

namespace Src\Application\MediaRepositorySeasons\Domain\Contracts;

use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\MediaRepositorySeasons\Domain\SeasonEntity;
use Src\Application\MediaRepositorySeasons\Domain\ValueObjects\SeasonIdValueObject;
use Src\Application\MediaRepositorySeasons\Domain\ValueObjects\SeasonValueObject;

interface SeasonRepositoryContract
{

    public function store(RepositoryIdValueObject $repositoryIdValueObject, SeasonValueObject $object):SeasonEntity;

    public function delete(RepositoryIdValueObject $repositoryIdValueObject, SeasonIdValueObject $seasonIdValueObject):SeasonEntity;
}
