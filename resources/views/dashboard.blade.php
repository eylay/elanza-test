@extends('layouts.dashboard')

@section('content')
    <div class="text-center">

        <h3>داشبورد شما</h3>

        <div class="d-flex justify-content-center">
            <p class="card-text my-2">
                چون پروژه کوچیک هستش و قسمت های زیادی نداره به همین خاطر صفحه داشبورد ساده طراحی شده.
                برای مدیریت دسته بندی ها میتونید از منوی بالا به قسمت مدیریت دسته بندی ها برین یا روی لینک زیر کلیک کنین
            </p>
        </div>

        <hr class="my-4">

        <a href="{{route('cats.index')}}" class="btn btn-primary"> مدیریت دسته بندی ها </a>

    </div>
@endsection
