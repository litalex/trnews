<?php

namespace Litalex\Component\Resource;

use Litalex\Component\Resource\Interfaces\ResourceInterface;
use Litalex\Component\Resource\Interfaces\ResourceProviderInterface;
use Litalex\Component\Resource\Interfaces\ResourceRepositoryInterface;
use Litalex\Models\Resource;

/**
 * Class ResourceProvider.
 */
class ResourceProvider implements ResourceProviderInterface
{
    private $repo;
    private $resource;

    /**
     * NewsResource constructor.
     *
     * @param ResourceRepositoryInterface $resourceRepo
     * @param ResourceInterface           $resource
     */
    public function __construct(ResourceRepositoryInterface $resourceRepo, ResourceInterface $resource)
    {
        $this->repo = $resourceRepo;
        $this->resource = $resource;
    }

    public function getResource(string $name) : ResourceInterface
    {
        $resourceData = Resource::where('name', $name)->first();

        return $this->resource->setData($resourceData);
    }
}
