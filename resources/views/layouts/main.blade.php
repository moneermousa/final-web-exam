<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <title>GenLib - @yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark p-3">
        <a class="navbar-brand" href="{{ route('home') }}"><span class="text-danger">Gen</span>Lib</a>


        <button class="navbar-toggler"
                type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavbar"
                aria-controls="collapsibleNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books.index') }}"><i class="fa-solid fa-book"></i>Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('students.index') }}"><i class="fa-solid fa-user"></i>Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('borrowings.index') }}"><i class="fas fa-book-reader"></i>Borrowings</a>
                </li>
            </ul>
        </div>  
    </nav>


    @yield('main_content')

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>