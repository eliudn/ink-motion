<?php

namespace Src\Application\MediaRepositorySeasons\Infrastructure\Repositories\Eloquent;

use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\MediaRepositorySeasons\Domain\Contracts\SeasonValidationContract;
use Src\Application\MediaRepositorySeasons\Domain\SeasonEntity;

class SeasonValidation implements SeasonValidationContract
{
     private  $repositorySeason;
     public function __construct()
     {
         $this->repositorySeason =new RepositorySeason();
     }

    public function verifyLastRecordFinalization(RepositoryIdValueObject $repositoryIdValueObject): SeasonEntity
    {
        $season = $this->repositorySeason->show($repositoryIdValueObject);
        if ($season->VerifyLastRecordFinalization())
        {
            return new SeasonEntity(null,'VERIFY_LAST_RECORD_FINALIZATION');
        }
        return new SeasonEntity();
    }
}
