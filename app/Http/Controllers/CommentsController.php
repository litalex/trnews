<?php

namespace Litalex\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Litalex\Repositories\CommentRepository;
use Symfony\Component\HttpFoundation\Request;

class CommentsController extends Controller
{
    protected $comment;

    /**
     * Create a new controller instance.
     *
     * @param CommentRepository $comment
     */
    public function __construct(CommentRepository $comment)
    {
        $this->comment = $comment;
    }

    public function store(Request $request)
    {
        $data = $request->request->all();

        $result[] = [
            'text' => $data['text'],
            'userId'  => Auth::user()->id,
            'newsId'  => $data['newsId'],
        ];

        $this->comment->saveFromArray($result);

        return Redirect::back();
    }
}
