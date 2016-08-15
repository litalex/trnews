<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

use App\Http\Requests;

class NewsController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var News
     */
    protected $news;

    /**
     * Create a new controller instance.
     *
     * @param News $news
     */
    public function __construct(News $news)
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
        return view('news.index', [
            'news' => $this->news->all(),
        ]);
    }

    public function view($id)
    {
        return view('news.view', [
            'news' => News::find($id),
        ]);
    }
}
