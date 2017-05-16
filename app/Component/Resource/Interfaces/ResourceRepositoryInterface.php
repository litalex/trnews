<?php

namespace Litalex\Component\Resource\Interfaces;

/**
 * Interface for NewsFeedRepository.
 */
interface ResourceRepositoryInterface
{
    public function getByName(string $name);
}
