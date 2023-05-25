<?php

namespace Src\Application\MediaRepositorySeasons\Application\Update;

use Src\Application\MediaRepositorySeasons\Domain\Contracts\SeasonRepositoryContract;
use Src\Application\MediaRepositorySeasons\Domain\SeasonEntity;
use Src\Application\MediaRepositorySeasons\Domain\ValueObjects\SeasonIdValueObject;
use Src\Application\MediaRepositorySeasons\Domain\ValueObjects\SeasonValueObject;

class SeasonUpdateStatusUseCase
{
    public function __construct(
        private readonly SeasonRepositoryContract $seasonRepositoryContract
    )
    {
    }
    public function __invoke(string $seasonId, array $request ): SeasonEntity
    {
       return $this->seasonRepositoryContract->updateStatus(
           new SeasonIdValueObject($seasonId),
           new SeasonValueObject($request)
       );
    }
}
