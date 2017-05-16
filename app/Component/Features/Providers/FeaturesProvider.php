<?php

namespace Litalex\Component\Features\Providers;

use Litalex\Component\Features\Interfaces\FeaturesRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Litalex\Component\Features\Interfaces\FeaturesInterface;
use Litalex\Component\Features\Features;
use Litalex\Models\News;
use Litalex\Repositories\NewsRepository;

/**
 * Class provider for Features.
 */
class FeaturesProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(FeaturesInterface::class, function ($app) {
                return new Features($app->make(FeaturesRepositoryInterface::class));
            }
        );

        $this->app->bind(FeaturesRepositoryInterface::class, function ($app) {
                return new NewsRepository($app->make(News::class));
            }
        );
    }
}
