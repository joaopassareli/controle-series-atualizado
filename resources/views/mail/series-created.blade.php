@component('mail::message')
    
# <center>Série {{ $seriesName}} foi criada!<br/></center>

<center><img src="{{ asset('storage/' . $cover_path) }}" alt="Capa da série {!! $seriesName !!}" class="img-fluid" style="height: 400px; margin: auto;"></center>

A série {{ $seriesName}} possui {{ $qtySeasons }} temporadas com {{ $qtyEpisodes }} episódios cada.

Clique aqui para acessá-la:

@component('mail::button', ['url' => route('seasons.index', $idSerie)])
Acessar
@endcomponent

@endcomponent