<?php

namespace Src\Application\MediaRepositorySeasons\Application\Get;

use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\MediaRepositorySeasons\Domain\Contracts\SeasonRepositoryContract;
use Src\Application\MediaRepositorySeasons\Domain\SeasonEntity;

class SeasonShowUseCase
{
    public function __construct(
        private  readonly SeasonRepositoryContract $seasonRepositoryContract
    )
    {
    }

    public function __invoke(string $repositoryId, ?bool $except = true):SeasonEntity
    {
        return $this->seasonRepositoryContract->show(
            new RepositoryIdValueObject($repositoryId,$except)
        );
    }
}
