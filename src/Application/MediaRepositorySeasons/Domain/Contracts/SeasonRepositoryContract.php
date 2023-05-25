<?php

namespace Src\Application\MediaRepositorySeasons\Domain\Contracts;

use Src\Application\MediaRepositories\Domain\ValueObjects\RepositoryIdValueObject;
use Src\Application\MediaRepositorySeasons\Domain\SeasonEntity;
use Src\Application\MediaRepositorySeasons\Domain\ValueObjects\SeasonIdValueObject;
use Src\Application\MediaRepositorySeasons\Domain\ValueObjects\SeasonOrderValueObject;
use Src\Application\MediaRepositorySeasons\Domain\ValueObjects\SeasonValueObject;

interface SeasonRepositoryContract
{

    /**
     * @param RepositoryIdValueObject $repositoryIdValueObject
     * @param SeasonValueObject $seasonValueObject
     * @return SeasonEntity
     */
    public function store(RepositoryIdValueObject $repositoryIdValueObject, SeasonValueObject $seasonValueObject):SeasonEntity;

    /**
     * @param RepositoryIdValueObject $repositoryIdValueObject
     * @param bool|null $except
     * @return SeasonEntity
     */
    public function show(RepositoryIdValueObject $repositoryIdValueObject, ?bool $except=true):SeasonEntity;

    /**
     * @param SeasonIdValueObject $seasonIdValueObject
     * @param bool|null $except
     * @return SeasonEntity
     */
    public function showBySeasonId(SeasonIdValueObject $seasonIdValueObject,?bool $except=true):SeasonEntity;

    /**
     * @param RepositoryIdValueObject $repositoryIdValueObject
     * @param SeasonIdValueObject $seasonIdValueObject
     * @return SeasonEntity
     */
    public function delete(RepositoryIdValueObject $repositoryIdValueObject, SeasonIdValueObject $seasonIdValueObject):SeasonEntity;

    /**
     * @param SeasonIdValueObject $seasonIdValueObject
     * @param SeasonValueObject $seasonValueObject
     * @return SeasonEntity
     */
    public function updateStatus(SeasonIdValueObject $seasonIdValueObject, SeasonValueObject $seasonValueObject):SeasonEntity;

    /**
     * @param RepositoryIdValueObject $repositoryIdValueObject
     * @param SeasonOrderValueObject $seasonOrderValueObject
     * @return SeasonEntity
     */
    public function showByRepositoryIdByOrder(RepositoryIdValueObject $repositoryIdValueObject, SeasonOrderValueObject $seasonOrderValueObject):SeasonEntity;
}
