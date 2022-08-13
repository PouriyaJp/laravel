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

                @include('admin.alerts.alert-section.success')

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

                            @foreach($postCategories as $key => $postCategory)

                            <tr class="font-size-12">
                                <th>{{ $key += 1 }}</th>
                                <td>{{ $postCategory->name }}	</td>
                                <td>{{ $postCategory->description }}</td>
                                <td>{{ $postCategory->slug }}</td>
                                <td>
                                    <img src="{{ asset($postCategory->image['indexArray'][$postCategory->image['currentImage']]) }}" alt="" style="width: 40px;height: 40px;">
                                </td>
                                <td>{{ $postCategory->tags }}</td>
                                <td>
                                    <label for="">

                                        <input type="checkbox" id="{{ $postCategory->id }}" onchange="changeStatus({{ $postCategory->id }})"
                                               data-url="{{ route('admin.content.category.status', $postCategory->id) }}" @if($postCategory->status === 1) checked @endif >

                                    </label>
                                </td>
                                <td class="text-align">
                                    <a href="{{ route('admin.content.category.edit', $postCategory->id) }}" class="btn btn-primary btn-sm font-size-12"><i class="fa fa-edit ml-1"></i>ویرایش</a>
                                    <form class="d-inline" action="{{ route('admin.content.category.destroy', $postCategory->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger btn-sm font-size-12 delete" type="submit"><i class="fa fa-trash-alt ml-1"></i>حذف</button>
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

@section('script')

    <script type="text/javascript">

        function changeStatus(id){
            const element = $('#' + id);
            const url = element.attr('data-url');
            let elementValue = !element.prop('checked');

            $.ajax({
                url : url ,
                type : "GET" ,
                success : function (response){

                    if (response.status){

                        if (response.checked){

                            element.prop('checked', true);
                            successToast('دسته بندی با موفقیت فعال شد');

                        }

                        else {

                            element.prop('checked', false);
                            successToast('دسته بندی با موفقیت غیر فعال شد');

                        }
                    }
                    else {

                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود آمده است');

                    }
                },
                error : function () {

                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد');

                }
            });

            function successToast(message){

                const successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                        '<strong class="ml-auto">' + message + '</strong>\n' +
                        '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                            '<span aria-hidden="true">&times;</span>\n' +
                        '</button>\n' +
                    '</section>\n' +
                '</section>';

                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5500).queue(function () {
                    $(this).remove();
                })

            }

            function errorToast(message){

                const errorToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(errorToastTag);
                $('.toast').toast('show').delay(5500).queue(function () {
                    $(this).remove();
                })

            }

        }

    </script>

    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])

@endsection
