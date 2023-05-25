<?php

namespace Src\Application\PlotSection\Infrastructure\Controllers;

use Src\Application\PlotSection\Application\Store\PlotSectionAddUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;

class PlotSectionAppController extends CustomController
{
    use HttpCodeHelper;
    public function __construct(
        private readonly PlotSectionAddUseCase $plotSectionAddUseCase
    )
    {
    }
    public function __invoke(string $RepositoryId, string $seasonOrder)
    {
        return $this->jsonResponse(
            $this->created(),
            false,
            $this->plotSectionAddUseCase->__invoke($RepositoryId,$seasonOrder)
        );
    }
}
