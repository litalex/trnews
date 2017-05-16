<?php

namespace Litalex\Component\Widget;

use Litalex\Component\Widget\Interfaces\WidgetRenderInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class WidgetRenderServiceProvider.
 */
class WidgetRenderServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(WidgetRenderInterface::class, function ($app) {
                return new WidgetRender();
            }
        );
    }
}
