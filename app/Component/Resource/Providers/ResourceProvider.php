<?php

namespace Litalex\Component\Resource\Providers;

use Litalex\Component\Resource\Interfaces\ResourceInterface;
use Litalex\Component\Resource\Interfaces\ResourceProviderInterface;
use Litalex\Component\Resource\NewsResource;
use Litalex\Models\Resource;
use Litalex\Repositories\ResourceRepository;
use Illuminate\Support\ServiceProvider;
use Litalex\Component\Resource\Interfaces\ResourceRepositoryInterface;

/**
 * Class provider for NewsFeed.
 */
class ResourceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            ResourceProviderInterface::class, function ($app) {
            return new \Litalex\Component\Resource\ResourceProvider($app->make(ResourceRepositoryInterface::class), $app->make(ResourceInterface::class));
        }
        );

        $this->app->bind(
            ResourceInterface::class, function ($app) {
            return new NewsResource($app->make(Resource::class));
        }
        );

        $this->app->bind(
            ResourceRepositoryInterface::class, function ($app) {
            return new ResourceRepository($app->make(Resource::class));
        }
        );
    }
}
