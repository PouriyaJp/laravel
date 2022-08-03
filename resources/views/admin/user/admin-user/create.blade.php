@extends('admin.layouts.master')

@section('head-tag')
<title>ایجاد کاربر ادمین</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">کاربران ادمین</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد کاربر ادمین</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ایجاد کاربر ادمین
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.user.admin-user.index') }}" class="btn btn-info btn-sm font-size-12">بازگشت</a>
            </section>

            <section>
                <form action="" method="">
                    <section class="row">

                        <section class="col-12 col-md-6">
                            <div class="form-group font-size-12">
                                <label for="">نام</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group font-size-12">
                                <label for="">نام خانوادگی</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group font-size-12">
                                <label for="">ایمیل</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </section>
                     <section class="col-12 col-md-6">
                            <div class="form-group font-size-12">
                                <label for=""> شماره موبایل</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </section>
                     <section class="col-12 col-md-6">
                            <div class="form-group font-size-12">
                                <label for="">کلمه عبور</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </section>
                    <section class="col-12 col-md-6">
                            <div class="form-group font-size-12">
                                <label for="">تکرار کلمه عبور</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </section>
                    <section class="col-12 col-md-6">
                            <div class="form-group font-size-12">
                                <label for="">تصویر</label>
                                <input type="file" class="form-control form-control-sm font-size-12">
                            </div>
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group font-size-12">
                                <label for="">وضعیت کاربر</label>
                                <select name="" id="" class="form-control form-control-sm">
                                    <option value="">غیر فعال</option>
                                    <option value="">فعال</option>
                                </select>
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
