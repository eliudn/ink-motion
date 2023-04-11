<?php

namespace Src\Application\FileUser\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\RouteServiceProvider as ServiceProvider;

final class RouteServicesProvider extends ServiceProvider
{
    public function __construct($app)
    {
        $appVersion = env('APP_VERSION');
        $this->setDependency(
            'api/'.$appVersion.'/user/{userId}/file',
            'Src\Application\FileUser\Infrastructure\Controllers',
            'src/Application/FileUser/Infrastructure/Routes/Api.php',
            false
        );
        parent::__construct($app);
    }
}
