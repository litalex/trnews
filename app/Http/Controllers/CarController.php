<?php

namespace Litalex\Http\Controllers;

use Illuminate\Http\Response;
use Litalex\Interfaces\CrudControllerInterface;
use Litalex\Repositories\TrainerRepository;
use Symfony\Component\HttpFoundation\Request;

class CarController extends Controller implements CrudControllerInterface
{
    /**
     * The news repository instance.
     *
     * @var TrainerRepository
     */
    protected $car;

    /**
     * Create a new controller instance.
     *
     * @param CarRepository $car
     */
    public function __construct(CarRepository $car)
    {
        $this->car = $car;
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
        $trainers = $this->car->getAllEnabledWithCars();

        return view('car.index', [
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
        return view('car.view', [
            'trainer' => $this->car->getOneEnabledBySlugWithCars($slug),
        ]);
    }
}
