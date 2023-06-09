<?php

namespace Src\Shared\Infrastructure\Services;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

abstract class RouteServiceProvider extends ServiceProvider
{
    private mixed $prefix;
    private mixed $namespaceName;
    private mixed $group;
    private ?bool $except;

    /**
     * @param mixed $prefix
     * @param mixed $namespace
     * @param mixed $group
     * @param bool|null $execpt
     * @return void
     */
    public function setDependency(
        mixed $prefix,
        mixed $namespace,
        mixed $group,
        ?bool $execpt =null
    ):void
    {
        $this->prefix = $prefix;
        $this->namespaceName = $namespace;
        $this->group = $group;
        $this->except = $execpt;
    }

    /**
     * @return void
     */
    public function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
    }

    public function map():void
    {
        $this->mapRoute();
    }

    public function mapRoute():void
    {

        if($this->except){
            Route::middleware('api')
                ->prefix($this->prefix)
                ->namespace($this->namespaceName)
                ->group(base_path($this->group));
        }else{
            Route::middleware(['api', 'jwt'])
                ->prefix($this->prefix)
                ->namespace($this->namespaceName)
                ->group(base_path($this->group));
        }
    }
}
