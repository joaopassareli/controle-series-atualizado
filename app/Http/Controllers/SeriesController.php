<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    public function index()
    {    
        $series = Series::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')
            ->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Series::create($request->all());
        for($i = 1; $i <= $request->seasonQty; $i++){
            $season = $serie->season()->create([
                'number' => $i,
            ]);

            for($j = 1; $j < $request->episodesPerSeason; $j++){
                $season->episodes()->create([
                    'number' => $j
                ]);
            }
        }

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso!");
    }

    public function edit(Series $series)
    {
        return view('series.edit')
            ->with('serie', $series);
    }

    public function destroy(Series $series) 
    {
        $series->delete();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso!");
    }

    public function update (Series $series, SeriesFormRequest $request)
    {
        $nomeAntigo = $series->nome;
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "A série '{$nomeAntigo}' foi alterada para '{$series->nome}.'");
    }
}
