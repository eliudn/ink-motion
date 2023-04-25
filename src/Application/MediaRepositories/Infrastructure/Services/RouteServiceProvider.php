<?php

namespace Src\Application\MediaRepositories\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    public function __construct($app)
    {
        $appVersion = env('APP_VERSION');
        $this->setDependency(
            'api/'.$appVersion.'/user/{userId}/repository',
            'Src\Application\MediaRepositories\Infrastructure\Controllers',
            'src/Application/MediaRepositories/Infrastructure/Routes/Api.php',
            false
        );
        parent::__construct($app);
    }
}
