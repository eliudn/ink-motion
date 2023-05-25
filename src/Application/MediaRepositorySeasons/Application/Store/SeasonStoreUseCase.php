<?php

namespace Src\Application\MediaRepositorySeasons\Application\Store;

use Src\Application\MediaRepositories\Application\Validation\RepositoryCheckStatusUseCase;
use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\MediaRepositorySeasons\Application\Get\SeasonShowUseCase;
use Src\Application\MediaRepositorySeasons\Application\Validation\SeasonVerifyLastRecordFinalizationUseCase;
use Src\Application\MediaRepositorySeasons\Domain\Contracts\SeasonRepositoryContract;
use Src\Application\MediaRepositorySeasons\Domain\SeasonEntity;
use Src\Application\MediaRepositorySeasons\Domain\ValueObjects\SeasonValueObject;

class SeasonStoreUseCase
{
    public function __construct(
        private readonly SeasonRepositoryContract  $seasonRepositoryContract,
        private readonly RepositoryCheckStatusUseCase $repositoryCheckStatusUseCase,
        private readonly SeasonShowUseCase $seasonShowUseCase,
        private readonly SeasonVerifyLastRecordFinalizationUseCase $seasonVerifyLastRecordFinalizationUseCase
    )
    {
    }

    public function __invoke(string $userId, string $repositoryId):SeasonEntity
    {
        $this->checkStatusRepository($userId,$repositoryId);
        $this->validationLastRecordStatusFinalization($repositoryId);
        return $this->seasonRepositoryContract->store(
            new RepositoryIdValueObject($repositoryId),
            new SeasonValueObject($this->newSeason($repositoryId))
        );
    }

    private function checkStatusRepository(string $userId,string $repositoryId):void
    {
        $this->repositoryCheckStatusUseCase->__invoke(
            $userId,
            $repositoryId
        );
    }

    private function newSeason(string $repositoryId):array
    {
        return ["order"=>$this->seasonShowUseCase->__invoke($repositoryId, false)->newSeason()];
    }

    private function validationLastRecordStatusFinalization(string $repositoryId):void
    {
        $this->seasonVerifyLastRecordFinalizationUseCase->__invoke($repositoryId);
    }
}
