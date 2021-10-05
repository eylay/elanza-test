<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="utf-8">
        <title> صفحه اصلی </title>

        <link rel="stylesheet" href="{{asset('vendor/bootstrap/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/megamenu.css')}}">
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    </head>
    <body>

        <header class="bg-secondary text-white d-flex align-items-center justify-content-around p-3">
            <h4>هدر وبسایت</h4>
            <a href="{{route('dashboard')}}" class="btn btn-outline-light"> ناحیه کاربری </a>
        </header>

        @if ($mainCats->count())
            <nav>
                <ul class="megamenu">
                    @foreach ($mainCats as $mainCat)
                        <li>{{$mainCat->title}}</li>
                        @if ($mainCat->subs->count())
                            <div class="dropdown">
                                <div class="menu">
                                    @foreach ($mainCat->subs as $subCat)
                                        <div>
                                            <h4 class="sub-cat"> <a href="#">{{$subCat->title}}</a> </h4>
                                            @if ($subCat->subs->count())
                                                <ul class="final-ul">
                                                    @foreach ($subCat->subs as $finalCat)
                                                        <li> <a href="#"> {{$finalCat->title}} </a> </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                <p> اینجا دسته بندی ها رو تا 3 سطح نمایش میده. بقیه سطوح رو گذاشتم برای زمانی که به لیست محصولات هدایت میشه ببینه. </p>
                            </div>
                        @endif
                    @endforeach
                </ul>
            </nav>
        @else
            <div class="alert alert-info m-4 text-center">
                هنوز دسته بندی ها تعریف نشده است.
                ابتدا وارد حساب کاربری شوید و دسته بندی ها را تعریف کنید.
            </div>
        @endif

        <div class="d-flex p-5">
            <p class="m-auto"> ادامه محتوای سایت </p>
        </div>

        <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>

    </body>
</html>
