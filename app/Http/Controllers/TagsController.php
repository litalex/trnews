<?php

namespace Litalex\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
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
     * Create a new controller instance.
     *
     * @param TagsRepository $tags
     */
    public function __construct(TagsRepository $tags)
    {
        $this->tags = $tags;
    }

    /**
     * Display a list of all of the tags with it news.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tags = $this->tags->getAllEnabledWithNews();

        return view('tags.index', [
            'tags' => $tags,
        ]);
    }

    /**
     * Display one tag with it news.
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($slug)
    {
        return view('tags.view', [
            'tags' => $this->tags->getOneEnabledBySlugWithTags($slug),
        ]);
    }
}
