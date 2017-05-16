<?php

namespace Litalex\Component\NewsFeed;

use Litalex\Component\NewsFeed\Interfaces\NewsFeedInterface;
use Litalex\Component\NewsFeed\Interfaces\NewsFeedRepositoryInterface;

/**
 * Class NewsFeed.
 */
class NewsFeed implements NewsFeedInterface
{
    private $newsFeedRepository;

    /**
     * NewsFeed constructor.
     *
     * @param NewsFeedRepositoryInterface $newsFeedRepository
     */
    public function __construct(NewsFeedRepositoryInterface $newsFeedRepository)
    {
        $this->newsFeedRepository = $newsFeedRepository;
    }

    public function get(int $limit, bool $pagination = false) : array
    {
        $newsFeed = $this->newsFeedRepository->getNewsFeed($limit);

        if ($pagination) {
            $pagination = str_replace('/?', '?', $newsFeed->render());
        }

        return [
            'news' => $newsFeed->get(),
            'pagination' => $pagination,
        ];
    }
}
