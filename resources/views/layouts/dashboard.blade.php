<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="utf-8">
        <title> داشبورد </title>
        <meta name="csrf" content="{{csrf_token()}}">

        <link rel="stylesheet" href="{{asset('vendor/bootstrap/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    </head>
    <body>

        {{-- top navbar --}}
        <nav class="navbar navbar-expand-lg navbar-light navbar-dark bg-dark">
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

            {{-- display laravel validation errors if any --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="m-0">
                        @foreach ($errors->all() as $err)
                            <li> {{$err}} </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- display success messages --}}
            @if (session('success'))
                <div class="alert alert-success">
                    تغییرات با موفقیت ذخیره شد.
                </div>
            @endif

            {{-- yield content --}}
            @yield('content')

        </div>

        <script src="{{asset('vendor/sweat-alert/swal.min.js')}}"></script>
        <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('js/custom.js')}}"></script>
    </body>
</html>
