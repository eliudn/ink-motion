<?php

namespace Src\Application\MediaRepositorySeasons\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\RouteServiceProvider as ServiceProvider;

 class RouteServiceProvider extends ServiceProvider
{

    public function __construct($app)
    {
        $appVersion = env('APP_VERSION');
        $this->setDependency(
            'api/'.$appVersion.'/user/{userId}/repository/{repositoryId}/season',
            'Src\Application\MediaRepositorySeasons\Infrastructure\Controllers',
            'src/Application/MediaRepositorySeasons/Infrastructure/Routes/Api.php',
            false
        );
        parent::__construct($app);
    }
}
