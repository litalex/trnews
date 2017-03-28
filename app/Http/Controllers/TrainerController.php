<?php

namespace Litalex\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Litalex\Models\Trainer;
use Litalex\Repositories\TrainerRepository;
use Symfony\Component\HttpFoundation\Request;

class TrainerController extends Controller
{
    const TRAINERS_PER_PAGE = 9;
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
        $trainers = Trainer::whereEnabled(true)->paginate(self::TRAINERS_PER_PAGE);

        $links = str_replace('/?', '?', $trainers->render());

        return view(
            'trainer.index',
            [
                'trainers' => $trainers,
                'links'    => $links,
            ]
        );
    }

    public function search(Request $request)
    {
        if (Input::has('reset')) {
            return Redirect::route('index_trainer');
        }

        $search = $request->request->all();

        $filters = [
            'city'                 => '',
            'gender'               => '',
            'minPayByHour'         => 0,
            'maxPayByHour'         => 1000000,
            //            'minPayByDistance' => 0,
            //            'maxPayByDistance' => 1000000,
            'minTrainerExperience' => 0,
            'maxTrainerExperience' => 100,
            'studentCar'           => '',
            'brand'                => '',
            'transmission'         => '',
        ];

        foreach ($search as $name => $value) {
            $filters[$name] = !empty($value) ? $value : $filters[$name];
        }

        $trainers = Trainer::whereEnabled(true)
            ->ofGender($filters['gender'])
            ->OfPayByHour($filters['minPayByHour'], $filters['maxPayByHour'])
//            ->OfPayByDistance($filters['minPayByDistance'], $filters['maxPayByDistance'])
            ->ofTrainerExperience($filters['minTrainerExperience'], $filters['maxTrainerExperience'])
            ->OfStudentCar($filters['studentCar'])
            ->ofCarBrand($filters['brand'])
            ->ofCarTransmission($filters['transmission'])
            ->ofCity($filters['city'])
            ->get();

        return view(
            'trainer.index',
            [
                'trainers' => $trainers,
                'error' => trans("base.errors.not_found_posts"),
            ]
        );
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
        return view(
            'trainer.view',
            [
                'trainer' => $this->trainer->getOneEnabledBySlugWithCars($slug),
            ]
        );
    }
}
