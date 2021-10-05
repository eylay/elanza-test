@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3>مدیریت دسته بندی ها</h3>
        <a href="javascript:void" data-bs-toggle="modal" data-bs-target="#new-cat" class="btn btn-primary btn-sm" data-bs-id="">
            + تعریف دسته بندی جدید
        </a>
    </div>
    <hr>
    @if ($mainCats->count())
        <div id="all-cats">
            @foreach ($mainCats as $cat)
                {{-- برای جلوگیری از تکرار کد از اینکلود استفاده شده. چرا که این قسمت در هنگام ارسال ایجکس ریکوست نیز مورد نیاز است --}}
                <div class="cat-container">
                    @include('dashboard.cats.card')
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-warning" role="alert">
            هنوز هیچ دسته بندی تعریف نشده.
        </div>
    @endif


    <!-- New Category Modal -->
    <div class="modal fade" id="new-cat" tabindex="-1">
        <div class="modal-dialog">
            <form id="store-cat" class="modal-content" action="{{route('cats.store')}}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title"> اضافه کردن دسته بندی </h5>
                    <button type="button" class="btn-close ml-0 mr-auto" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="mb-2" for="cat-tile"> عنوان دسته بندی </label>
                        <input type="text" class="form-control cat-title" required>
                        <input type="hidden" class="cat-id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> انصراف </button>
                    <button type="submit" class="btn btn-primary"> تایید </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="edit-cat" tabindex="-1">
        <div class="modal-dialog">
            <form id="update-cat" class="modal-content" action="" method="PUT">
                <div class="modal-header">
                    <h5 class="modal-title"> ویرایش دسته بندی </h5>
                    <button type="button" class="btn-close ml-0 mr-auto" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="mb-2" for="cat-tile"> عنوان دسته بندی </label>
                        <input type="text" class="form-control cat-title" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> انصراف </button>
                    <button type="submit" class="btn btn-primary"> تایید </button>
                </div>
            </form>
        </div>
    </div>

@endsection
