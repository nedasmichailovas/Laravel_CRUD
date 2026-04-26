<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Studentu sistema')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>
 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('students.index') }}">
            Studentu sistema
        </a>
        <div class="ms-auto d-flex align-items-center gap-2">
            @auth
                <span class="text-light me-2">
                    Sveiki, {{ Auth::user()->name }}
                </span>
                <a href="{{ route('students.index') }}"
                   class="btn btn-outline-light btn-sm">
                    Studentai
                </a>
                <form method="POST" action="{{ route('logout') }}"
                      style="display:inline">
                    @csrf
                    <button type="submit"
                            class="btn btn-outline-danger btn-sm">
                        Atsijungti
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                   class="btn btn-outline-light btn-sm">
                    Prisijungti
                </a>
                <a href="{{ route('register') }}"
                   class="btn btn-light btn-sm">
                    Registruotis
                </a>
            @endauth
        </div>
    </div>
</nav>
 
<div class="container mt-4">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
 
    @yield('content')
</div>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
</script>
</body>
</html>
