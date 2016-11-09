<?php

namespace Litalex\Http\Controllers;

use Illuminate\Http\Response;
use Litalex\Interfaces\CrudControllerInterface;
use Litalex\Repositories\TrainerRepository;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller implements CrudControllerInterface
{
    /**
     * The news repository instance.
     *
     * @var TrainerRepository
     */
    protected $trainer;

    /**
     * Create a new controller instance.
     *
     * @param TrainerRepository $trainer
     */
    public function __construct(TrainerRepository $trainer)
    {
        $this->trainer = $trainer;
    }

    /**
     * Display a list of all of the trainers.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $trainers = $this->trainer->getAllEnabledWithCars();

        return view('index.index', [
            'trainers' => $trainers,
        ]);
    }

    public function store(Request $request)
    {
        // TODO: Implement store() method.
    }

    public function destroy(Request $request)
    {
        // TODO: Implement destroy() method.
    }

    /**
     * Display one trainer.
     *
     * @param $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($slug)
    {
        return view('trainer.view', [
            'trainer' => $this->trainer->getOneEnabledBySlugWithTags($slug),
        ]);
    }
}
