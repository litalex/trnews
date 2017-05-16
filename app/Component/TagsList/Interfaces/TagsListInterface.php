<?php

namespace Litalex\Component\TagsList\Interfaces;

/**
 * Interface for NewsFeed.
 */
interface TagsListInterface
{
    public function get(int $limit = 0, bool $pagination = false) : array;
}
