<?php

namespace Litalex\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;
use Litalex\Models\Task;
use Litalex\Repositories\NewsRepository;
use Litalex\Repositories\TagsRepository;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var NewsRepository
     */
    protected $news;

    /**
     * The task repository instance.
     *
     * @var TagsRepository
     */
    protected $tags;

    /**
     * Create a new controller instance.
     *
     * @param  NewsRepository $news
     * @param  TagsRepository $tags
     */
    public function __construct(NewsRepository $news, TagsRepository $tags)
    {
        $this->news = $news;
        $this->tags = $tags;
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        $menu = $this->getLeftSideMenu();

        return view('admin.index',[
            'menu' => $menu,
        ]);
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function view(Request $request)
    {
        $menu = $this->getLeftSideMenu();
        $data = $this->{explode('/', $request->getRequestUri())[2]}->getAll();

        return view('admin.view',[
            'menu' => $menu,
            'data' => $data,
        ]);
    }

    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect('/index');
    }

    private function getLeftSideMenu()
    {
        return [
            [
                'title' => Lang::get('base.news'),
                'href' => URL::route('admin_news'),
            ],
            [
                'title' => Lang::get('base.tags'),
                'href' => URL::route('admin_tags'),
            ],
        ];
    }
}
