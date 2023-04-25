<?php

namespace Src\Application\PlotSection\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\DependencyServiceProvider as ServiceProvider;
class DependencyServicesProvider extends ServiceProvider
{
    public function __construct($app)
    {
        $this->setDependency([
            [
                "useCase"=>[],
                "contract"=>"",
                "repository"=>""
            ]
        ]);
        parent::__construct($app);
    }
}
