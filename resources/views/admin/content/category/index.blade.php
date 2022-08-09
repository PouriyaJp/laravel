@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">دسته بندی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        دسته بندی
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.content.category.create') }}" class="btn btn-info btn-sm font-size-12">ایجاد دسته بندی</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="font-size-12">
                                <th>#</th>
                                <th>نام دسته بندی</th>
                                <th>توضیحات</th>
                                <th>اسلاگ</th>
                                <th>عکس</th>
                                <th>تگ ها</th>
                                <th>وضعیت</th>
                                <th class="text-align"><i class="fa fa-cogs ml-1"></i>تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($postCategories as $postCategory)

                            <tr class="font-size-12">
                                <th>1</th>
                                <td>{{ $postCategory->name }}	</td>
                                <td>{{ $postCategory->description }}</td>
                                <td>{{ $postCategory->slug }}</td>
                                <td>
                                    <img src="{{ asset($postCategory->image) }}" alt="" style="width: 40px;height: 40px;">
                                </td>
                                <td>{{ $postCategory->tags }}</td>
                                <td>
                                    <label for="">
                                        <input type="checkbox" @if($postCategory->status === 1) checked @endif >


                                    </label>
                                </td>
                                <td class="text-align">
                                    <a href="{{ route('admin.content.category.edit', $postCategory->id) }}" class="btn btn-primary btn-sm font-size-12"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                    <form class="d-inline" action="{{ route('admin.content.category.destroy', $postCategory->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger btn-sm font-size-12" type="submit"><i class="fa fa-trash-alt ml-1"></i>حذف</button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>

@endsection
