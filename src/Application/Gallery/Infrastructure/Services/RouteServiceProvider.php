<?php

namespace Src\Application\Gallery\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    public function __construct($app)
    {
        $appVersion = env('APP_VERSION');
        $this->setDependency(
            'api/'.$appVersion.'/user/{userId}/gallery',
            'Src\Application\Gallery\Infrastructure\Controllers',
            'src/Application/Gallery/Infrastructure/Routes/Api.php',
            false
        );
        parent::__construct($app);
    }
}
