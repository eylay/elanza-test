<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="utf-8">
        <title> داشبورد </title>

        <link rel="stylesheet" href="{{asset('vendor/bootstrap/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{url('/')}}">Elanza</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link @if(request()->route()->getName() == 'dashboard') active @endif" href="{{route('dashboard')}}">
                                داشبورد
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(request()->route()->getName() == 'cats.index') active @endif" href="{{route('cats.index')}}">
                                مدیریت دسته بندی ها
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container py-5">
            @yield('content')
        </div>

        <script src="{{asset('vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>
    </body>
</html>
