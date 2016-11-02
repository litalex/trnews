<?php

namespace Litalex\Providers;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

/**
 * Class RouteServiceProvider
 *
 * @package Litalex\Providers
 */
class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Litalex\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     * @param  Request                    $request
     * @return void
     */
    public function map(Router $router, Request $request)
    {
        $defaultLocale = App::getLocale();
        $locale = $request->segment(1);
        if (array_search($locale, Config::get('app.locales')) === false) {
            $locale = $defaultLocale;
        }
        $this->app->setLocale($locale);
        $groupOption = ['namespace' => $this->namespace];

        if ($locale !== $defaultLocale) {
            $groupOption = array_merge($groupOption, ['prefix' => $locale]);
        }

        $router->group($groupOption, function ($router) {
                require app_path('Http/routes.php');
            }
        );
    }
}
