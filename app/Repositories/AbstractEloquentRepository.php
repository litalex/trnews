<?php

namespace Litalex\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AbstractEloquentRepository
 *
 * @package Litalex\Repositories
 */
abstract class AbstractEloquentRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Return all
     */
    public function all()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }
}