<section class="container mt-4">
    <header class="mb-4">
        <h2 class="text-center text-success font-weight-bold">
            Atualizar Palavra-passe
        </h2>
        <p class="text-muted text-center">
            Certifique-se de que a sua conta utiliza uma palavra-passe longa e aleatória para permanecer segura.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="p-4 bg-light rounded shadow-sm">
        @csrf
        @method('put')

        <div class="form-group mb-3">
            <label for="update_password_current_password" class="form-label">Palavra-passe Atual</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
            @error('current_password', 'updatePassword')
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="update_password_password" class="form-label">Nova Palavra-passe</label>
            <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
            @error('password', 'updatePassword')
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="update_password_password_confirmation" class="form-label">Confirmar Palavra-passe</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-success">Guardar</button>
            @if (session('status') === 'password-updated')
                <span class="text-success">Guardado.</span>
            @endif
        </div>
    </form>
</section>
