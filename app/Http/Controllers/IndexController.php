<?php

namespace Litalex\Http\Controllers;

use Illuminate\Http\Response;
use Litalex\Models\News;
use Litalex\Parsers\NewsParser;
use Litalex\Repositories\CommentRepository;
use Litalex\Repositories\NewsRepository;
use Illuminate\Http\Request;
use Litalex\Repositories\TagsRepository;

class IndexController extends Controller
{
    /**
     * @var NewsRepository
     */
    protected $news;
    protected $tags;
    protected $comments;

    /**
     * @var NewsParser
     */
    private $newsParser;

    /**
     * Create a new controller instance.
     *
     * @param NewsRepository    $news
     * @param TagsRepository    $tags
     * @param NewsParser        $newsParser
     * @param CommentRepository $comments
     */
    public function __construct(NewsRepository $news, TagsRepository $tags, NewsParser $newsParser, CommentRepository $comments)
    {
        $this->news = $news;
        $this->tags = $tags;
        $this->comments = $comments;
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
        $news = $this->news->getAllEnabledWithTags()->get();

//        $links = str_replace('/?', '?', $news->links());

        return view(
            'index.index',
            [
                'news'  => $news,
//                'links' => $links,
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
