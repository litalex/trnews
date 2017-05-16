<?php

namespace Litalex\Http\Controllers;

use Illuminate\Http\Response;
use Litalex\Component\TagsList\Interfaces\TagsListInterface;
use Litalex\Component\TagsList\TagsListWidgetData;
use Litalex\Component\Widget\Interfaces\WidgetRenderInterface;
use Litalex\Models\News;
use Litalex\Repositories\NewsRepository;

/**
 * Class NewsController.
 */
class NewsController extends Controller
{
    /**
     * @var NewsRepository
     */
    protected $news;

    /**
     * @var TagsListInterface
     */
    protected $tagsList;

    /**
     * @var WidgetRenderInterface
     */
    protected $widgetRender;

    /**
     * Create a new controller instance.
     *
     * @param NewsRepository        $news
     * @param TagsListInterface     $tagsList
     * @param WidgetRenderInterface $widgetRender
     */
    public function __construct(NewsRepository $news, TagsListInterface $tagsList, WidgetRenderInterface $widgetRender)
    {
        $this->news = $news;
        $this->tagsList = $tagsList;
        $this->widgetRender = $widgetRender;
    }

    /**
     * Display a list of all of the news.
     *
     * @return Response
     */
    public function index()
    {
        $news = $this->news->getAllEnabledWithTags(20)->paginate(News::NEWS_PER_PAGE);

        $pagination = str_replace('/?', '?', $news->render());

        return view(
            'news.index',
            [
                'news'  => $news,
                'pagination' => $pagination,
                'tagsListWidget' => $this->widgetRender->create(
                    new TagsListWidgetData('tags.widget.list', $this->tagsList->get()))->render(),
            ]
        );
    }

    /**
     * Display one news.
     *
     * @param $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($slug)
    {
        return view(
            'news.view',
            [
                'news' => $this->news->getOneEnabledBySlugWithTags($slug)->first(),
                'tagsListWidget' => $this->widgetRender->create(
                    new TagsListWidgetData('tags.widget.list', $this->tagsList->get()))->render(),
            ]
        );
    }
}
