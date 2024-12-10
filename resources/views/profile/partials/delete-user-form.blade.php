<section class="container mt-4">
    <header class="mb-4">
        <h2 class="text-center text-danger font-weight-bold">
            Eliminar Conta
        </h2>
        <p class="text-muted text-center">
            Uma vez que a sua conta for eliminada, todos os seus recursos e dados serão apagados permanentemente. Antes de eliminar a sua conta, por favor, descarregue quaisquer dados ou informações que deseje reter.
        </p>
    </header>

    <div class="text-center">
        <button
            class="btn btn-danger"
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >
            Eliminar Conta
        </button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-4 bg-light rounded shadow-sm">
            @csrf
            @method('delete')

            <h3 class="text-danger font-weight-bold">
                Tem a certeza de que deseja eliminar a sua conta?
            </h3>

            <p class="text-muted mt-2">
                Uma vez que a sua conta for eliminada, todos os seus recursos e dados serão apagados permanentemente. Por favor, insira a sua palavra-passe para confirmar que deseja eliminar a conta permanentemente.
            </p>

            <div class="form-group mt-4">
                <label for="password" class="form-label">Palavra-passe</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control"
                    placeholder="Introduza a sua palavra-passe"
                >
                @error('password', 'userDeletion')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button type="button" class="btn btn-secondary me-3" x-on:click="$dispatch('close')">
                    Cancelar
                </button>
                <button type="submit" class="btn btn-danger">
                    Eliminar Conta
                </button>
            </div>
        </form>
    </x-modal>
</section>
