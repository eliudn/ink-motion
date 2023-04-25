<?php

namespace Src\Application\PlotSection\Infrastructure\Services;


use Src\Shared\Infrastructure\Services\RouteServiceProvider as ServicesProvider;
class RouteServicesProvider extends ServicesProvider
{
   public function __construct($app)
   {
       $appVersion = env('APP_VERSION');
        $this->setDependency(
           'api/'.$appVersion.'/user/{userId}/repository/{repositoryId}/plotSection',
           'Src\Application\PlotSection\Infrastructure\Controllers',
           'src/Application/PlotSection/Infrastructure/Routes/Api.php',
           false
                  );
       parent::__construct($app);
   }
}
