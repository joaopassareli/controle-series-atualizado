<x-layout title="Séries" :mensagem-sucesso="$mensagemSucesso">
    @auth
        <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    @endauth

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                
                <div class="d-flex align-items-center">
                    <img src="{{ asset('storage/' . $serie->cover_path) }}" alt="Capa da série" class="img-thumbnail me-3" width="120">
                    
                    <a href="{{ route('seasons.index', $serie->id) }}" class="align-middle">
                        {{ $serie->nome }}
                    </a>
                </div>
                            
                <div class="botoes d-flex">
                    @auth
                        <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-info btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a>                    

                        <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm ms-1">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    @endauth
                </div>    
            </li>
        @endforeach
    </ul>
    
</x-layout>