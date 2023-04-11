<?php

namespace Src\Application\UserInformation\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    public function __construct($app)
    {
        $appVersion = env('APP_VERSION');
        $this->setDependency(
            'api/'.$appVersion.'/user',
            'Src\Application\UserInformation\Infrastructure\Controllers',
            'src/Application/UserInformation/Infrastructure/Routes/Api.php',
            false
        );
        parent::__construct($app);
    }
}
