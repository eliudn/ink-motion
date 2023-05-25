<?php

namespace Src\Application\MediaRepositorySeasons\Infrastructure\Repositories\Eloquent;

use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\MediaRepositorySeasons\Domain\Contracts\SeasonRepositoryContract;
use Src\Application\MediaRepositorySeasons\Domain\SeasonEntity;
use Src\Application\MediaRepositorySeasons\Domain\ValueObjects\SeasonIdValueObject;
use Src\Application\MediaRepositorySeasons\Domain\ValueObjects\SeasonOrderValueObject;
use Src\Application\MediaRepositorySeasons\Domain\ValueObjects\SeasonValueObject;

use Src\Application\MediaRepositorySeasons\Infrastructure\Enum\Status;
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
     * @param SeasonValueObject $seasonValueObject
     * @return SeasonEntity
     */
    public function store(RepositoryIdValueObject $repositoryIdValueObject, SeasonValueObject $seasonValueObject): SeasonEntity
    {
        $season = $this->model->create([
            "order"=>$seasonValueObject->value()["order"],
            "status"=>Status::IN_PROGRESS->value,
            "media_repository_id"=>$repositoryIdValueObject->value()
        ]);
        return new SeasonEntity($season);
    }

    /**
     * @param RepositoryIdValueObject $repositoryIdValueObject
     * @param SeasonIdValueObject $seasonIdValueObject
     * @return SeasonEntity
     */
    public function delete(RepositoryIdValueObject $repositoryIdValueObject, SeasonIdValueObject $seasonIdValueObject): SeasonEntity
    {
        return  new SeasonEntity();
    }

    /**
     * @param RepositoryIdValueObject $repositoryIdValueObject
     * @param bool|null $except
     * @inheritDoc
     */
    public function show(RepositoryIdValueObject $repositoryIdValueObject, ?bool $except = true): SeasonEntity
    {
        $season = $this->model
            ->where('media_repository_id', $repositoryIdValueObject->value())
            ->get();

        if((is_null($season)  or $season->isEmpty())&&  !$except )
        {
            return new SeasonEntity(null, 'REPOSITORY_SEASON_NOT_FOUND');
        }

        return new SeasonEntity($season);
    }

    /**
     * @inheritDoc
     */
    public function updateStatus(SeasonIdValueObject $seasonIdValueObject, SeasonValueObject $seasonValueObject): SeasonEntity
    {
        $season = $this->showBySeasonId($seasonIdValueObject)->entity();
        $season->update($seasonValueObject->value());
        return new SeasonEntity($season);
    }

    /**
     * @inheritDoc
     */
    public function showBySeasonId(SeasonIdValueObject $seasonIdValueObject, ?bool $except = false): SeasonEntity
    {
        $season = $this->model->where('id',$seasonIdValueObject->value())->first();
       // dd($seasonIdValueObject->value());
        if(is_null($season) &&  !$except)
        {
            return new SeasonEntity(null, 'REPOSITORY_SEASON_NOT_FOUND');
        }
        return new SeasonEntity($season);
    }

    /**
     * @inheritDoc
     */
    public function showByRepositoryIdByOrder(RepositoryIdValueObject $repositoryIdValueObject, SeasonOrderValueObject $seasonOrderValueObject): SeasonEntity
    {
        $season = $this->model
            ->where('repository_id', $repositoryIdValueObject->value())
            ->where('order', $seasonOrderValueObject)
            ->first();
        if(is_null($season))
        {
            return new SeasonEntity(null, 'REPOSITORY_SEASON_NOT_FOUND');
        }
        return new SeasonEntity($season);
    }
}
