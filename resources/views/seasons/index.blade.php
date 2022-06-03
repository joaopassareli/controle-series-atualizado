<x-layout title="Temporadas da Série {!! $series->nome !!}">

    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Temporada nº {{ $season->number }}

                <span class="badge rounded-pill bg-info">
                    {{ $season->episodes->count() }}
                </span>
        @endforeach
    </ul>

</x-layout>
