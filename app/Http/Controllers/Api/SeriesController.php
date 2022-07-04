<?php

namespace App\Http\Controllers\Api;

use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {
    }

    public function index ()
    {
        return Series::all();
    }

    public function store (SeriesFormRequest $request)
    {
        return response()
            ->json($this->seriesRepository->add($request), 201);
    }

    public function show(Series $series)
    {
        return $series;
    }


    //mostrando todos os dados de uma série específica
    // public function show(int $series){
    //     $series = Series::whereId($series)->with('seasons.episodes')
    //         ->first();

    //         return $series;
    // }
}
