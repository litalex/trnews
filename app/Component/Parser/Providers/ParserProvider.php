<?php

namespace Litalex\Component\Parser\Providers;

use Illuminate\Support\ServiceProvider;
use Litalex\Component\Parser\CrawlerProvider;
use Litalex\Component\Parser\Interfaces\ParserInterface;
use Litalex\Component\Parser\Interfaces\ParserProviderInterface;
use Litalex\Component\Parser\NewsParser;
use Litalex\Component\Resource\Interfaces\ResourceProviderInterface;

/**
 * Class provider for NewsFeed.
 */
class ParserProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ParserInterface::class, function ($app) {
                return new NewsParser($app->make(ParserProviderInterface::class), $app->make(ResourceProviderInterface::class));
            }
        );

        $this->app->bind(ParserProviderInterface::class, function ($app) {
                return new CrawlerProvider();
            }
        );
    }
}
