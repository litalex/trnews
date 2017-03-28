<?php

namespace Litalex\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Litalex\Models\Tags;

/**
 * Class TagsRepository
 *
 * @package Litalex\Repositories
 */
class TagsRepository
{
    /**
     * NewsRepository constructor.
     *
     * @param Tags $tag
     */
    public function __construct(Tags $tag)
    {
        $this->model = $tag;
    }

    /**
     * Get all news with tags.
     *
     * @return Collection
     */
    public function getAll()
    {
        return $this->model
            ->get();
    }

    /**
     * Get all enabled news with tags.
     *
     * @return Collection
     */
    public function getAllEnabledWithNews()
    {
        return $this->findByEnabled()
            ->with('news')
            ->get();
    }

    /**
     * Get all enabled news with tags.
     *
     * @return Collection
     */
    public function getAllEnabled()
    {
        return $this->findByEnabled();
    }

    /**
     * Get one enabled news by $slug
     *
     * @param string  $slug
     * @param integer $limit
     * @return mixed
     */
    public function getOneEnabledBySlugWithNews(string $slug, int $limit)
    {
        $links = '';
        $tagAndNews = $this->findByEnabled()
            ->whereSlug($slug)
            ->with(
                [
                    'news' => function ($query) use ($limit, &$links) {
                        $pagination = $query->paginate($limit);
                        $links = str_replace('/?', '?', $pagination->render());
                    },
                ]
            )
            ->first();

        return [
            'tagAndNews' => $tagAndNews,
            'links' => $links,
        ];
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
