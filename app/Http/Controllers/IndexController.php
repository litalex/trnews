<?php

namespace Litalex\Http\Controllers;

use Litalex\Component\Features\Features;
use Litalex\Component\Features\FeaturesWidgetData;
use Litalex\Component\Features\Interfaces\FeaturesInterface;
use Litalex\Component\TagsList\TagsListWidgetData;
use Illuminate\Http\Response;
use Litalex\Component\NewsFeed\Interfaces\NewsFeedInterface;
use Litalex\Component\NewsFeed\NewsFeedWidgetData;
use Litalex\Component\TagsList\Interfaces\TagsListInterface;
use Litalex\Component\Widget\Interfaces\WidgetRenderInterface;

/**
 * Class IndexController.
 */
class IndexController extends Controller
{
    /**
     * @var NewsFeedInterface
     */
    protected $newsFeed;

    /**
     * @var TagsListInterface
     */
    protected $tagsList;

    /**
     * @var Features
     */
    private $features;

    /**
     * @var WidgetRenderInterface
     */
    protected $widgetRender;

    /**
     * Create a new controller instance.
     *
     * @param NewsFeedInterface     $newsFeed
     * @param TagsListInterface     $tagsList
     * @param FeaturesInterface     $features
     * @param WidgetRenderInterface $widgetRender
     */
    public function __construct(
        NewsFeedInterface $newsFeed,
        TagsListInterface $tagsList,
        FeaturesInterface $features,
        WidgetRenderInterface $widgetRender
    )
    {
        $this->newsFeed = $newsFeed;
        $this->tagsList = $tagsList;
        $this->features = $features;
        $this->widgetRender = $widgetRender;
    }

    /**
     * Display a list of all of the news.
     *
     * @return Response
     */
    public function index()
    {
        return view(
            'index.index',
            [
                'newsWidget' => $this->widgetRender->create(
                    new NewsFeedWidgetData('news.widget.feed', $this->newsFeed->get(20)))->render(),
                'featuresWidget' => $this->widgetRender->create(
                    new FeaturesWidgetData('news.widget.features', $this->features->get(4)))->render(),
                'tagsListWidget' => $this->widgetRender->create(
                    new TagsListWidgetData('tags.widget.list', $this->tagsList->get()))->render(),
            ]
        );
    }
}
