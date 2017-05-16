<?php

namespace Litalex\Component\NewsFeed\Providers;

use Litalex\Component\NewsFeed\Interfaces\NewsFeedRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Litalex\Component\NewsFeed\Interfaces\NewsFeedInterface;
use Litalex\Component\NewsFeed\NewsFeed;
use Litalex\Models\News;
use Litalex\Repositories\NewsRepository;

/**
 * Class provider for NewsFeed.
 */
class NewsFeedProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(NewsFeedInterface::class, function ($app) {
                return new NewsFeed($app->make(NewsFeedRepositoryInterface::class));
            }
        );

        $this->app->bind(NewsFeedRepositoryInterface::class, function ($app) {
                return new NewsRepository($app->make(News::class));
            }
        );
    }
}
