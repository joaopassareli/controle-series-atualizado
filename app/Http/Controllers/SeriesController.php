<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use App\Events\SeriesDestroyed;
use App\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;
use App\Events\SeriesCreated as SeriesCreatedEvent;

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
        //Este if verifica se existe uma imagem inserida no input, se o retorno for positivo ele cria a série com a capa selecionada
        //se for negativo ele utiliza o arquivo padrão "no_cover.gif" que fica armazenado na pasta storage/app/public/series_cover.
        if($request->hasFile('cover')){
            $coverPath = $request->file('cover')->store('series_cover', 'public');
            $request->coverPath = $coverPath;
        }else{
            $request->coverPath = 'series_cover/no_cover.gif';
        }

        $serie = $this->repository->add($request);

        SeriesCreatedEvent::dispatch(
          $serie->nome,
          $serie->id,
          $request->seasonsQty,
          $request->episodesPerSeason,
          $request->coverPath,
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

        SeriesDestroyed::dispatch(
            $series->cover_path,
        );

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
