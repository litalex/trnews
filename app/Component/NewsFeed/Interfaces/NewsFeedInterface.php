<?php

namespace Litalex\Component\NewsFeed\Interfaces;

/**
 * Interface for NewsFeed.
 */
interface NewsFeedInterface
{
    public function get(int $limit, bool $pagination = false) : array;
}
