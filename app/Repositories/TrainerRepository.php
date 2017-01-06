<?php

namespace Litalex\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Litalex\Models\News;
use Litalex\Models\Tags;
use Litalex\Models\Trainer;

/**
 * Class TrainerRepository
 *
 * @package Litalex\Repositories
 */
class TrainerRepository
{
    /**
     * The Tag instance.
     *
     * @var News
     */
    protected $tag;

    /**
     * NewsRepository constructor.
     *
     * @param Trainer $trainer
     * @param Tags $tag
     */
    public function __construct(Trainer $trainer, Tags $tag)
    {
        $this->model = $trainer;
        $this->tag = $tag;
    }

    public function search($params)
    {
        $query = $this->findByEnabled()->with('cars');

        foreach ($params as $name => $param) {
            $query->andWhere($name = $param);
        }

        $query->get();
    }

    /**
     * Get all enabled news with tags.
     *
     * @return Collection
     */
    public function getAllEnabledWithCars()
    {
        return $this->findByEnabled()
            ->with('cars')
            ->get();
    }

    /**
     * Get all news with tags.
     *
     * @return Collection
     */
    public function getAll()
    {
        return $this->model
            ->with('cars')
            ->get();
    }

    /**
     * Get one enabled news by $slug
     *
     * @param $slug
     * @return mixed
     */
    public function getOneEnabledBySlugWithCars($slug)
    {
        return $this->findByEnabled()
            ->whereSlug($slug)
            ->with('cars')
            ->first();
    }

    /**
     * Find enabled
     *
     * @return mixed
     */
    private function findByEnabled()
    {
        return $this->model
            ->whereEnabled(true);
    }

    /**
     * Find enabled by ID
     *
     * @param $id
     * @return mixed
     */
    private function findById($id)
    {
        return $this->findByEnabled()
            ->where('id', $id);
    }
}
