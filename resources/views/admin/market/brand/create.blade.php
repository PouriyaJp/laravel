@extends('admin.layouts.master')

@section('head-tag')
    <title>برند</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">برند</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد برند</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد برند
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.brand.index') }}" class="btn btn-info btn-sm font-size-12">بازگشت</a>
                </section>

                <section>
                    <form action="" method="">
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group font-size-12">
                                    <label for="">نام برند</label>
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group font-size-12">
                                    <label for="">دسته والد</label>
                                    <input type="file" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12">
                                <button class="btn btn-primary btn-sm font-size-12">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

@endsection
