<?php

namespace Src\Application\MediaRepositorySeasons\Application\Get;

use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\MediaRepositorySeasons\Domain\Contracts\SeasonRepositoryContract;
use Src\Application\MediaRepositorySeasons\Domain\SeasonEntity;
use Src\Application\MediaRepositorySeasons\Domain\ValueObjects\SeasonOrderValueObject;

class SeasonShowByOrderByRepositoryIdUseCase
{

    public function __construct(
        private readonly SeasonRepositoryContract $seasonRepositoryContract
    )
    {
    }
    public function __invoke(string $repositoryId, string $order): SeasonEntity
    {
        return $this->seasonRepositoryContract->showByRepositoryIdByOrder(
            new RepositoryIdValueObject($repositoryId),
            new SeasonOrderValueObject($order)
        );
    }
}
