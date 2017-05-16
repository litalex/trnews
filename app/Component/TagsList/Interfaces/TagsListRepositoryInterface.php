<?php

namespace Litalex\Component\TagsList\Interfaces;

/**
 * Interface for NewsFeedRepository.
 */
interface TagsListRepositoryInterface
{
    public function getTagsList(int $limit);
}
