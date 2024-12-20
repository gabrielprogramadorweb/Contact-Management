<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Contact Management')</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            display: flex;
        }

        #sidebar {
            height: 100vh;
            background-color: white;
            color: #343a40;
            position: fixed;
            width: 250px;
            top: 56px;
            margin-top: 17px;
            left: 0;
            overflow-y: auto;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        #sidebar.collapsed {
            width: 0;
            overflow: hidden;
        }

        #content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        #content.collapsed {
            margin-left: 0;
        }

        .sidebar-link {
            text-decoration: none;
            color: #343a40;
            padding: 10px 20px;
            display: block;
        }

        .sidebar-link:hover {
            background-color: #0D6EFD;
            color: white;
        }

        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

        #toggleSidebar {
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 1050;
            background-color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        #toggleSidebar.collapsed {
            left: 10px;
        }
    </style>
</head>
<body>
<div id="toastr-messages"></div>

<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container-fluid">
        <div class="d-flex justify-content-center w-100">
            <a class="navbar-brand ms-3" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="width: 140px;">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            @if (Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="fa fa-edit"></i> Editar Perfil
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item" type="submit">
                                    <i class="fa fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li class="nav-item" style="margin-right: 6px;">
                    @if (!Auth::check() && Route::currentRouteName() !== 'login')
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    @endif
                </li>

            @endif
        </ul>
    </div>
</nav>

<div id="sidebar" class="collapsed">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('contacts.index') }}" class="nav-link sidebar-link"><i class="fa fa-address-book"></i> Contatos</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('contacts.create') }}" class="nav-link sidebar-link"><i class="fa fa-plus"></i> Novo Contato</a>
        </li>
    </ul>
</div>

<button id="toggleSidebar" class="collapsed">
    <i class="fa fa-chevron-right"></i>
</button>

<div id="content" class="collapsed">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const toggleButton = document.getElementById('toggleSidebar');

        sidebar.classList.add('collapsed');
        content.classList.add('collapsed');
        toggleButton.innerHTML = '<i class="fa fa-chevron-right"></i>';

        toggleButton.addEventListener('click', function () {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('collapsed');
            toggleButton.classList.toggle('collapsed');

            if (sidebar.classList.contains('collapsed')) {
                toggleButton.innerHTML = '<i class="fa fa-chevron-right"></i>';
            } else {
                toggleButton.innerHTML = '<i class="fa fa-chevron-left"></i>';
            }
        });
    });
</script>
</body>
</html>
