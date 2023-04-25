<?php

namespace Src\Application\MediaRepositorySeasons\Application\Store;

use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\MediaRepositorySeasons\Domain\Contracts\SeasonRepositoryContract;
use Src\Application\MediaRepositorySeasons\Domain\SeasonEntity;
use Src\Application\MediaRepositorySeasons\Domain\ValueObjects\SeasonValueObject;

class SeasonStoreUseCase
{
    public function __construct(
        private readonly SeasonRepositoryContract $seasonRepositoryContract
    )
    {
    }

    public function __invoke(string $repositoryId, array $request):SeasonEntity
    {
        return $this->seasonRepositoryContract->store(
            new RepositoryIdValueObject($repositoryId),
            new SeasonValueObject($request)
        );
    }
}
