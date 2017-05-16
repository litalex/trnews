<?php

namespace Litalex\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Litalex\Component\TagsList\Interfaces\TagsListRepositoryInterface;
use Litalex\Models\Tags;

/**
 * Class TagsRepository.
 */
class TagsRepository implements TagsListRepositoryInterface
{
    /**
     * @var Tags
     */
    private $model;

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
        return $this->enabled()->get();
    }

    /**
     * Get all enabled news with tags.
     *
     * @return Collection
     */
    public function getAllEnabledWithNews()
    {
        return $this->enabled()
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
        return $this
            ->enabled();
    }

    /**
     * Get one enabled news by $slug
     *
     * @param string  $name
     * @param integer $limit
     * @return mixed
     */
    public function getOneEnabledBySlugWithNews(string $name, int $limit)
    {
        $links = '';
        $tagAndNews = $this->enabled()
            ->whereName($name)
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
    private function enabled()
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
        return $this->enabled()
            ->where('id', $id);
    }

    /**
     * Returns tags forList
     *
     * @param int $limit
     *
     * @return mixed
     */
    public function getTagsList(int $limit = 0)
    {
        $tags = $this->enabled();

        if ($limit > 0) {
            return $tags->limit($limit);
        }

        return $tags->orderBy('position', 'ASC');
    }
}
