<?php

namespace Litalex\Component\TagsList;

use Litalex\Component\TagsList\Interfaces\TagsListInterface;
use Litalex\Component\TagsList\Interfaces\TagsListRepositoryInterface;

/**
 * Class NewsFeed.
 */
class TagsList implements TagsListInterface
{
    private $tagsListRepository;

    /**
     * NewsFeed constructor.
     *
     * @param TagsListRepositoryInterface $tagsListRepository*
     */
    public function __construct(TagsListRepositoryInterface $tagsListRepository)
    {
        $this->tagsListRepository = $tagsListRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function get(int $limit = 0, bool $pagination = false) : array
    {
        $tagsList = $this->tagsListRepository->getTagsList($limit);

        if ($pagination) {
            $pagination = str_replace('/?', '?', $tagsList->render());
        }

        return [
            'tags' => $tagsList->get(),
            'pagination' => $pagination,
        ];
    }
}
