<x-layout title="Episódios da Temporada" :mensagem-sucesso="$mensagemSucesso">

    <form method="post">
        <ul class="list-group">
            @csrf
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio {{ $episode->number }}
    
                    <input type="checkbox"
                        name="episodes[]"
                        id="episodes"
                        value="{{ $episode->id }}"
                        @if ($episode->watched) checked @endif />
                </li>    
            @endforeach
        </ul>
        
        <button class="btn btn-primary mt-3 mb-3">Salvar</button>
    </form>
    
</x-layout>
 