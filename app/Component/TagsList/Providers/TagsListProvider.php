<?php

namespace Litalex\Component\TagsList\Providers;

use Litalex\Component\TagsList\Interfaces\TagsListRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Litalex\Component\TagsList\Interfaces\TagsListInterface;
use Litalex\Component\TagsList\TagsList;
use Litalex\Models\Tags;
use Litalex\Repositories\TagsRepository;

/**
 * Class provider for NewsFeed.
 */
class TagsListProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(TagsListInterface::class, function ($app) {
                return new TagsList($app->make(TagsListRepositoryInterface::class));
            }
        );

        $this->app->bind(TagsListRepositoryInterface::class, function ($app) {
                return new TagsRepository($app->make(Tags::class));
            }
        );
    }
}
