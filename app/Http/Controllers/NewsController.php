<?php

namespace Litalex\Http\Controllers;

use Litalex\Repositories\NewsRepository;
use Illuminate\Http\Request;
use Litalex\Http\Requests;

class NewsController extends Controller
{
    /**
     * The task repository instance.
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
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        $news = $this->news->getAllEnabled();

        return view('news.index', [
            'news' => $news,
        ]);
    }

    public function view($id)
    {
        return view('news.view', [
            'news' => $this->news->getOneEnabledById($id),
        ]);
    }
}
