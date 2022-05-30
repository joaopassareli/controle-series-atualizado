<x-layout title="Cadastrar Série">

    <form action="route('series.store')" method="post">
        @csrf
        
        <div class="row mb-3">
            <div class="col-6">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{old('nome')}}" autofocus>
            </div>

            <div class="col-2">
                <label for="seasonsQty" class="form-label">Nº de Temporadas:</label>
                <input type="number" id="seasonsQty" name="seasonsQty" class="form-control" value="{{old('nome')}}">
            </div>

            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Episódios:</label>
                <input type="number" id="episodesPerSeason" name="episodesPerSeason" class="form-control" value="{{old('nome')}}">
            </div>
        </div>
            
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

</x-layout>