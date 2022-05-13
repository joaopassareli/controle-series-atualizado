<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request){
        $series = [
            'Friends',
            'Lost',
            'Grey\'s Anathomy'
        ];

        return view('series.index')->with('series', $series);
    }

    public function create(){
        return view('series.create');
    }
}
