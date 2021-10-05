<div class="card my-3 cat-card" data-cat-id="{{$cat->id}}">
    <div class="card-body">
        <div class="custom-breadcrumb text-center mb-3">
            @foreach ($cat->breadcrumbs as $i => $breadcrumb)
                @if ($i)
                    <span class="mx-1"> - </span>
                @endif
                <a href="javascript:void" class="@if($breadcrumb->id == $cat->id) active @else load-subcats @endif" data-route="{{route('cats.subs', $breadcrumb)}}" >
                    {{$breadcrumb->title}}
                </a>
            @endforeach
        </div>
        @if ($cat->subs->count())
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th> عنوان </th>
                        <th> زیرشاخه ها </th>
                        <th colspan="3"> عملیات </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cat->subs as $subCategory)
                        <tr>
                            <td> {{$subCategory->title}} </td>
                            <td> {{$subCategory->subs->count()}} </td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-sm load-subcats" data-route="{{route('cats.subs', $subCategory)}}">
                                    زیرشاخه ها
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-success btn-sm" data-title="{{$subCategory->title}}" data-id="{{$cat->id}}" data-route="{{route('cats.update', $subCategory)}}" data-bs-toggle="modal" data-bs-target="#edit-cat">
                                    ویرایش
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-danger btn-sm delete-cat" data-route="{{route('cats.destroy', $subCategory)}}">
                                    حذف
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
        @else
            <hr>
            <div class="alert alert-info">
                این دسته بندی هیچ زیرشاخه ای ندارد.
            </div>
        @endif
        <div class="text-start">
            <a href="javascript:void" class="btn btn-outline-danger btn-sm delete-cat" data-type="card" data-route="{{route('cats.destroy', $cat)}}">
                حذف این دسته بندی
            </a>
            <a href="javascript:void" class="btn btn-outline-success btn-sm mx-1" data-title="{{$cat->title}}" data-id="{{$cat->id}}" data-route="{{route('cats.update', $cat)}}" data-bs-toggle="modal" data-bs-target="#edit-cat" data-type="card">
                ویرایش این دسته بندی
            </a>
            <a href="javascript:void" data-bs-toggle="modal" data-bs-target="#new-cat" class="btn btn-outline-primary btn-sm" data-bs-id="{{$cat->id}}">
                + اضافه کردن زیرشاخه
            </a>
        </div>
    </div>
</div>
