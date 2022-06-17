<x-layout title="Cadastrar Série">

    <form action="{{ route('series.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="row mb-3">
            <div class="col-6">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome') }}" autofocus>
            </div>

            <div class="col-2">
                <label for="seasonsQty" class="form-label">Nº de Temporadas:</label>
                <input type="number" id="seasonsQty" name="seasonsQty" class="form-control" value="{{ old('seasonsQty') }}">
            </div>

            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Episódios:</label>
                <input type="number" id="episodesPerSeason" name="episodesPerSeason" class="form-control" value="{{ old('episodesPerSeason') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <label for="cover" class="form-label">Capa da Série:</label>
                <input type="file" id="cover" name="cover" class="form-control" accept="image/gif, image/jpeg, image/png">
            </div>
        </div>
            
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

</x-layout>