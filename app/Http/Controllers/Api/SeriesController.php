<?php

namespace App\Http\Controllers\Api;

use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    public function index ()
    {
        return Series::all();
    }

    public function store (SeriesFormRequest $request)
    {
        return response()
            ->json(Series::create($request->all()),
            201);
    }
}
