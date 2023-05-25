<?php

namespace Src\Application\PlotSection\Application\Get;

class PlotSectionShowByOrderUseCase
{

    public function __construct(
        private readonly PlotSectionRepositoryContract $plotSectionRepositoryContract
    )
    {
    }

    public function __invoke(string $repositoryId, string $order)
    {

    }
}
