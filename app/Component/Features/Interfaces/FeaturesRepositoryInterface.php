<?php

namespace Litalex\Component\Features\Interfaces;

/**
 * Interface for NewsFeedRepository.
 */
interface FeaturesRepositoryInterface
{
    public function getFeatures(int $limit);
}
