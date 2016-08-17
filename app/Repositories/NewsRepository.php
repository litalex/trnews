<?php

namespace Litalex\Repositories;

use Litalex\News;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class NewsRepository
 *
 * @package Litalex\Repositories
 */
class NewsRepository
{
    /**
     * Get all enabled news.
     *
     * @return Collection
     */
    public function getAllEnabled()
    {
        return $this->findByEnabled()
            ->orderBy('updated_at', 'desc')
            ->get();
    }

    /**
     * Get one enabled news by ID
     *
     * @param $id
     * @return mixed
     */
    public function getOneEnabledById($id)
    {
        return $this->findById($id)
            ->first();
    }

    /**
     * Find enabled
     *
     * @return mixed
     */
    private function findByEnabled()
    {
        return News::where('enabled', true);
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
