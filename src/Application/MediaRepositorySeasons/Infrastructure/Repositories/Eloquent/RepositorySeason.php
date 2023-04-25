<?php

namespace Src\Application\MediaRepositorySeasons\Infrastructure\Repositories\Eloquent;

use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\MediaRepositorySeasons\Domain\Contracts\SeasonRepositoryContract;
use Src\Application\MediaRepositorySeasons\Domain\SeasonEntity;
use Src\Application\MediaRepositorySeasons\Domain\ValueObjects\SeasonIdValueObject;
use Src\Application\MediaRepositorySeasons\Domain\ValueObjects\SeasonValueObject;

use Src\Application\MediaRepositorySeasons\Infrastructure\Repositories\Eloquent\MediaRepositorySeason as Model;

class RepositorySeason implements SeasonRepositoryContract
{
    private $model;

    public function __construct()
    {
        $this->model = new Model;
    }

    /**
     * @param RepositoryIdValueObject $repositoryIdValueObject
     * @param SeasonValueObject $object
     * @return SeasonEntity
     */
    public function store(RepositoryIdValueObject $repositoryIdValueObject, SeasonValueObject $object): SeasonEntity
    {
        $season = $this->model->create([

        ]);
        return new SeasonEntity();
    }

    /**
     * @param RepositoryIdValueObject $repositoryIdValueObject
     * @param SeasonIdValueObject $seasonIdValueObject
     * @return SeasonEntity
     */
    public function delete(RepositoryIdValueObject $repositoryIdValueObject, SeasonIdValueObject $seasonIdValueObject): SeasonEntity
    {
        // TODO: Implement delete() method.
    }
}
