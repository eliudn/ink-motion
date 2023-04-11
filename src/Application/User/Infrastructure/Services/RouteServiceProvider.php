<?php

namespace Src\Application\User\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    public function __construct($app)
    {
        $appVersion = env('APP_VERSION');
        $this->setDependency(
            'api/'.$appVersion.'/user',
            'Src\Application\User\Infrastructure\Controllers',
            'src/Application/User/Infrastructure/Routes/Api.php',
            false
        );
        parent::__construct($app);
    }
}
