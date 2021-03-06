<?php

namespace Litalex\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
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
     * Create a new controller instance.
     *
     * @param TagsRepository $tags
     * @param NewsRepository $news
     */
    public function __construct(TagsRepository $tags, NewsRepository $news)
    {
        $this->tags = $tags;
        $this->news = $news;
    }

    /**
     * Display a list of all of the tags with it news.
     *
     * @param  Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tags = $this->tags->getAllEnabledWithNews();

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
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($slug)
    {
        $result = $this->tags->getOneEnabledBySlugWithNews($slug, News::NEWS_PER_PAGE);

        $tagAndNews = $result['tagAndNews'];
        $links = $result['links'];

        return view(
            'tags.view',
            [
                'tags'     => $tagAndNews,
                'links'    => $links,
            ]
        );
    }
}
