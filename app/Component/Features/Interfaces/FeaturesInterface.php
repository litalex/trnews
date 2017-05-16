<?php

namespace Litalex\Component\Features\Interfaces;

/**
 * Interface for NewsFeed.
 */
interface FeaturesInterface
{
    public function get(int $limit, bool $pagination = false) : array;
}
