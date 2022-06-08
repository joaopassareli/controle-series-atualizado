<x-layout title="Novo Usuário">
    <form method="post">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" id="name">

            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email">

            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>   

        <button class="btn btn-primary mt-3">
            Registrar
        </button>

    </form>
</x-layout>