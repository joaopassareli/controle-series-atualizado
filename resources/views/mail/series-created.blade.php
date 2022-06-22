@component('mail::message')
    
    # Série {{ $seriesName}} foi criada!

    <img src="{{ asset('storage/' . $cover_path) }}" alt="Capa da série {!! $seriesName !!}" class="img-fluid" style="height: 400px; margin: auto;">
    ![Capa da série {!! $seriesName !!}]({{asset('storage/' . $cover_path)}})
    ![Capa da série][capa]
    [capa]: {{ asset('storage/' . $cover_path) }}
    
    A série {{ $seriesName}} possui {{ $qtySeasons }} temporadas com {{ $qtyEpisodes }} episódios cada.

    Clique aqui para acessá-la:

    @component('mail::button', ['url' => route('seasons.index', $idSerie)])
        Acessar
    @endcomponent

@endcomponent