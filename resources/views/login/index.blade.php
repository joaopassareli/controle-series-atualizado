<x-layout title="Login" :mensagem-sucesso="$mensagemSucesso">
    
    <form method="post">
        @csrf

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email">

            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>   

        <button class="btn btn-primary mt-3">
            Entrar
        </button>

        <a href="{{ route('users.create') }}" class="btn btn-secondary mt-3">
            Registrar
        </a>
    </form>

</x-layout>