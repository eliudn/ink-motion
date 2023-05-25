<?php

namespace Src\Application\PlotSection\Application\Store;

use Src\Application\MediaRepositorySeasons\Application\Get\SeasonShowByOrderByRepositoryIdUseCase;
use Src\Application\PlotSection\Domain\ValueObjects\SeasonXPloSectionValueObject;

class PlotSectionAddUseCase
{

    private $seanso;
    private $plotSection;
    private string $repositoryId;
    private string $seasonOrder;
    public function __construct(
        private readonly SeasonShowByOrderByRepositoryIdUseCase $byOrderByRepositoryIdUseCase,

    )
    {
    }

    public function __invoke(string $repositoryId, string $seasonOrder)
    {
        $this->repositoryId =$repositoryId;
        $this->seasonOrder  =$seasonOrder;

        return  $this->seasonShowByOrderByRepositoryId();
    }

    public function seasonShowByOrderByRepositoryId()
    {
        return $this->byOrderByRepositoryIdUseCase->__invoke($this->repositoryId,$this->seasonOrder)->entity();
    }
    private function seasonXPloSection( string $seasonXPloSection): void
    {
        $array = new  SeasonXPloSectionValueObject($seasonXPloSection);
        $this->seanso= $array->toArray()["season"];
        $this->plotSection = $array->toArray()["plotSection"];
    }
}
