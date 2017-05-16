<?php

namespace Litalex\Component\Resource\Interfaces;

/**
 * Interface for Resource.
 */
interface ResourceProviderInterface
{
    public function getResource(string $name) : ResourceInterface;
}
