<?php

namespace Litalex\Http\Controllers;

use Illuminate\Http\Response;
use Litalex\Repositories\NewsRepository;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * The news repository instance.
     *
     * @var NewsRepository
     */
    protected $news;

    /**
     * Create a new controller instance.
     *
     * @param NewsRepository $news
     */
    public function __construct(NewsRepository $news)
    {
        $this->news = $news;
    }

    /**
     * Display a list of all of the news.
     *
     * @param  Request  $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $news = $this->news->getAllEnabledWithTags();

        return view('news.index', [
            'news' => $news,
        ]);
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
        return view('news.view', [
            'news' => $this->news->getOneEnabledBySlugWithTags($slug),
        ]);
    }
}
