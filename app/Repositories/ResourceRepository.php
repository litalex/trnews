<?php

namespace Litalex\Repositories;

use Litalex\Component\Resource\Interfaces\ResourceRepositoryInterface;
use Litalex\Models\Resource;

/**
 * Class ResourceRepository.
 */
class ResourceRepository extends AbstractEloquentRepository implements ResourceRepositoryInterface
{
    /**
     * @var Resource $model
     */
    protected $model;

    /**
     * NewsRepository constructor.
     *
     * @param Resource $resource
     */
    public function __construct(Resource $resource)
    {
        $this->model = $resource;
    }

    /**
     * Get by name.
     *
     * @param string $name
     */
    public function getByName(string $name)
    {
        $this->model->whereEnabled(true)->whereName($name);
    }
}
