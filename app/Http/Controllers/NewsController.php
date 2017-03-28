<?php

namespace Litalex\Http\Controllers;

use Illuminate\Http\Response;
use Litalex\Models\News;
use Litalex\Parsers\NewsParser;
use Litalex\Repositories\NewsRepository;
use Illuminate\Http\Request;
use Litalex\Repositories\TagsRepository;

class NewsController extends Controller
{
    /**
     * @var NewsRepository
     */
    protected $news;
    protected $tags;

    /**
     * @var NewsParser
     */
    private $newsParser;

    /**
     * Create a new controller instance.
     *
     * @param NewsRepository $news
     * @param NewsParser     $newsParser
     */
    public function __construct(NewsRepository $news, TagsRepository $tags, NewsParser $newsParser)
    {
        $this->news = $news;
        $this->tags = $tags;
        $this->newsParser = $newsParser;
    }

    /**
     * Display a list of all of the news.
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $news = $this->news->getAllEnabledWithTags()->paginate(News::NEWS_PER_PAGE);

        $links = str_replace('/?', '?', $news->render());

        return view(
            'news.index',
            [
                'news'  => $news,
                'links' => $links,
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
                'news' => $this->news->getOneEnabledBySlugWithTags($slug),
            ]
        );
    }
}
