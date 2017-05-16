<?php

namespace Litalex\Component\NewsFeed\Interfaces;

/**
 * Interface for NewsFeedRepository.
 */
interface NewsFeedRepositoryInterface
{
    public function getNewsFeed(int $limit);
}
