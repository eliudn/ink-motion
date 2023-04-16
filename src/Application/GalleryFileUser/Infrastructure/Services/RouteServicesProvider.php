<?php

namespace Src\Application\GalleryFileUser\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\RouteServiceProvider as ServiceProvider;
class RouteServicesProvider extends ServiceProvider
{
    public function __construct($app)
    {
        $appVersion = env('APP_VERSION');
        $this->setDependency(
            'api/'.$appVersion.'/user/{userId}/galleryFile',
            'Src\Application\GalleryFileUser\Infrastructure\Controllers',
            'src/Application/GalleryFileUser/Infrastructure/Routes/Api.php',
            false
        );
        parent::__construct($app);
    }
}
