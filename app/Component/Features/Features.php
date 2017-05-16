<?php

namespace Litalex\Component\Features;

use Litalex\Component\Features\Interfaces\FeaturesInterface;
use Litalex\Component\Features\Interfaces\FeaturesRepositoryInterface;

/**
 * Class NewsFeed.
 */
class Features implements FeaturesInterface
{
    private $featureRepository;

    /**
     * Features constructor.
     *
     * @param FeaturesRepositoryInterface $featureRepository
     */
    public function __construct(FeaturesRepositoryInterface $featureRepository)
    {
        $this->featureRepository = $featureRepository;
    }

    public function get(int $limit, bool $pagination = false) : array
    {
        $newsFeed = $this->featureRepository->getFeatures($limit);

        if ($pagination) {
            $pagination = str_replace('/?', '?', $newsFeed->render());
        }

        return [
            'news' => $newsFeed->get(),
            'pagination' => $pagination,
        ];
    }
}
