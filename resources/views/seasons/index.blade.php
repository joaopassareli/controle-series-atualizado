<x-layout title="Temporadas da Série {!! $series->nome !!}">

    <img src="{{ asset('storage/' . $series->cover_path) }}" alt="Capa da série {!! $series->nome !!}" class="img-fluid" style="height: 400px; margin: auto;">

    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('episodes.index', $season->id) }}">
                    {{ $season->number }}ª Temporada
                </a>

                <span class="badge rounded-pill bg-secondary">
                    {{ $season->countWatchedEpisodes() }} 
                     / 
                    {{ $season->episodes->count() }}
                </span>
        @endforeach
    </ul>

</x-layout>
