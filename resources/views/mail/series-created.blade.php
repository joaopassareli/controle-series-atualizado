@component('mail::message')
    
    # Série {{ $seriesName}} foi criada!

    A série {{ $seriesName}} possui {{ $qtySeasons }} temporadas com {{ $qtyEpisodes }} episódios cada.

    Clique aqui para acessá-la:

    @component('mail::button', ['url' => route('seasons.index', $idSerie)])
        Acessar
    @endcomponent

@endcomponent