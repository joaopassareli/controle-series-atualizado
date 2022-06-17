<?php

namespace App\Http\Controllers;

use App\Events\SeriesCreated as SeriesCreatedEvent;
use App\Models\User;
use App\Models\Series;
use App\Mail\SeriesCreated;
use Illuminate\Support\Facades\Mail;
use App\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
        $this->middleware('auth')->except('index');
    }

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
        $serie = $this->repository->add($request);
        $fileType = $request->file('cover')->getMimeType();

        //Este if valida se o formato de capa recebido é em .gif, .png e .jpeg
        if($fileType === 'image/gif' || $fileType === 'image/png' || $fileType === 'image/jpeg'){
            $coverPath = $request->file('cover')->store('series_cover', 'public');
            $request->coverPath = $coverPath;
        }

        //Neste DD o coverPath está com os valores corretos
        //mas no EloquentSeriesRepository ele é enviado como NULL
        //dd($request->coverPath);

        SeriesCreatedEvent::dispatch(
          $serie->nome,
          $serie->id,
          $request->seasonsQty,
          $request->episodesPerSeason,  
        );
        
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
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
