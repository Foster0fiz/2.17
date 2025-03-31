<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">My Laravel Project</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('books.index') }}">Kitoblar</a>
                <a class="nav-link" href="{{ route('authors.index') }}">Mualliflar</a>
            </div>
        </div>
    </nav>
    
    @yield('content')
    
    <footer class="text-center mt-4 py-3 bg-light">
        © {{ date('Y') }} Все права защищены
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
