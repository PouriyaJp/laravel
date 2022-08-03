@extends('admin.layouts.master')

@section('head-tag')
<title>ایجاد اطلاعیه پیامکی</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">اطلاع رسانی</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">اطلاعیه پیامکی</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد اطلاعیه پیامکی</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ایجاد اطلاعیه پیامکی
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.notify.sms.index') }}" class="btn btn-info btn-sm font-size-12">بازگشت</a>
            </section>

            <section>
                <form action="" method="">
                    <section class="row">

                        <section class="col-12 col-md-6">
                            <div class="form-group font-size-12">
                                <label for="">عنوان پیامک</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </section>


                        <section class="col-12 col-md-6">
                            <div class="form-group font-size-12">
                                <label for=""> تاریخ انتشار</label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </section>

                        <section class="col-12">
                            <div class="form-group font-size-12">
                                <label for="">متن پیامک</label>
                                <textarea name="body" id="body"  class="form-control form-control-sm" rows="6"></textarea>
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
