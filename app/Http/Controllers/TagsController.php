<?php

namespace Litalex\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Litalex\Component\TagsList\Interfaces\TagsListInterface;
use Litalex\Component\TagsList\TagsListWidgetData;
use Litalex\Component\Widget\Interfaces\WidgetRenderInterface;
use Litalex\Models\News;
use Litalex\Repositories\NewsRepository;
use Litalex\Repositories\TagsRepository;

class TagsController extends Controller
{
    /**
     * The news repository instance.
     *
     * @var TagsRepository
     */
    protected $tags;

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
     * @param TagsRepository        $tags
     * @param NewsRepository        $news
     * @param TagsListInterface     $tagsList
     * @param WidgetRenderInterface $widgetRender
     */
    public function __construct(TagsRepository $tags, NewsRepository $news, TagsListInterface $tagsList, WidgetRenderInterface $widgetRender)
    {
        $this->tags = $tags;
        $this->news = $news;
        $this->tagsList = $tagsList;
        $this->widgetRender = $widgetRender;
    }

    /**
     * Display a list of all of the tags with it news.
     *
     * @return Response
     */
    public function index()
    {
        $tags = $this->tags->getAll();

        return view(
            'tags.index',
            [
                'tags' => $tags,
            ]
        );
    }

    /**
     * Display one tag with it news.
     *
     * @param string $name
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(string $name)
    {
        $result = $this->tags->getOneEnabledBySlugWithNews($name, News::NEWS_PER_PAGE);

        $tagAndNews = $result['tagAndNews'];
        $pagination = $result['links'];

        return view(
            'tags.view',
            [
                'tags' => $tagAndNews,
                'pagination' => $pagination,
                'tagListWidget' => $this->widgetRender->create(
                    new TagsListWidgetData('tags.widget.list', $this->tagsList->get()))->render(),
            ]
        );
    }
}
