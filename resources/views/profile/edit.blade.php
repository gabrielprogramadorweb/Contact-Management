<x-app-layout>
    <x-slot name="title">Edit Perfil</x-slot>
    <x-slot name="header">
        <h2 class="font-weight-bold text-dark text-center py-3 border-bottom">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12 mb-4">
                <div class="form-container shadow-sm rounded bg-light p-4">
                    <h5 class="text-primary text-center mb-3">
                        <i class="fas fa-user-edit"></i> Atualizar Informações do Perfil
                    </h5>
                    <div>
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-10 col-12 mb-4">
                <div class="form-container shadow-sm rounded bg-light p-4">
                    <h5 class="text-success text-center mb-3">
                        <i class="fas fa-key"></i> Alterar Palavra-passe
                    </h5>
                    <div>
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-10 col-12 mb-4">
                <div class="form-container shadow-sm rounded bg-light p-4">
                    <h5 class="text-danger text-center mb-3">
                        <i class="fas fa-trash-alt"></i> Eliminar Conta
                    </h5>
                    <div>
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .container{
            margin-top: 60px;
            position: relative;
            left: 53%;
            transform: translateX(-50%);
        }
        .form-container {
            transition: all 0.3s ease-in-out;
            border: 1px solid #e0e0e0;
        }

        .form-container:hover {
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
            border-color: #b0b0b0;
        }

        h5 {
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h5 i {
            margin-right: 8px;
        }
    </style>
</x-app-layout>
