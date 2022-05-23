<x-layout title="Séries">

    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item">
                {{ $serie->nome }}

                <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                    <button class="btn btn-danger">
                        X
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
    
</x-layout>