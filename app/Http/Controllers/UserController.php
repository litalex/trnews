<?php

namespace Litalex\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Litalex\Repositories\ArticleRepository;
use Litalex\Repositories\NewsRepository;
use Litalex\Repositories\UserRepository;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepo;

    /**
     * @var NewsRepository
     */
    private $newsRepo;

    private $articleRepo;

    /**
     * UserController constructor.
     *
     * @param UserRepository    $userRepo
     * @param NewsRepository    $newsRepo
     * @param ArticleRepository $articleRepo
     */
    public function __construct(UserRepository $userRepo, NewsRepository $newsRepo, ArticleRepository $articleRepo)
    {
        $this->userRepo = $userRepo;
        $this->newsRepo = $newsRepo;
        $this->articleRepo = $articleRepo;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile(Request $request)
    {
        $user = Auth::user();

        $news = $this->articleRepo->findAllByUserId($user->id)->get();

        return view(
            'user.index',
            [
                'user' => $user,
                'news' => $news,
            ]
        );
    }
}