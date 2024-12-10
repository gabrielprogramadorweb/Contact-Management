<section class="container mt-4">
    <header class="mb-4">
        <h2 class="text-center text-primary font-weight-bold">
            Informações do Perfil
        </h2>
        <p class="text-muted text-center">
            Atualize as informações do perfil da sua conta e o endereço de e-mail.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="p-4 bg-light rounded shadow-sm">
        @csrf
        @method('patch')

        <div class="form-group mb-3">
            <label for="name" class="form-label">Nome</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-3">
                    <p class="text-warning">
                        O seu endereço de e-mail não está verificado.
                        <button form="send-verification" class="btn btn-link p-0">
                            Clique aqui para reenviar o e-mail de verificação.
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="text-success">
                            Um novo link de verificação foi enviado para o seu endereço de e-mail.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary">Guardar</button>
            @if (session('status') === 'profile-updated')
                <span class="text-success">Guardado.</span>
            @endif
        </div>
    </form>
</section>
