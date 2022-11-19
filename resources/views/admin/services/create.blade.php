
@extends('admin.master')
@section('title' , 'ادارة الخدمات')
@section('content')
@section('styles')
<style>
    #di{
            text-align: right;
        }

    #la{
        color: black;
    }
</style>
@stop

    <div>
      <h1  class="h3 mb-4 text-gray-800 " style="text-align: right;">{{ __('Add Service') }}</h1>
    </div>

@include('admin.errors')

    <form action="{{ route('admin.services.store') }}" method="POST">
       @csrf

        {{-- service --}}
        <div class="col-md-6" id="di">
            <div>
                <label id="la">اسم الخدمة :</label>
                <input
                  type="text"
                  name="service"
                  placeholder="ادخل الخدمة"
                  class="form-control">
               <br>
            </div>
        </div>

        {{-- description --}}
        <div class="col-md-6" id="di">
                <label id="la">تفاصيل الخدمة :</label>
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <textarea  name="description" class="form-control "
                placeholder="تفاصيل الخدمة" rows="5"
                class="form-control" ></textarea>
               <br>
        </div>

        {{-- price --}}
        <div class="col-md-6 " id="di">
            <label id="la">سعر الخدمة  :<i class="fas fa-shekel-sign"></i></label>
            <input  value="" min="1"  type="number" name="price" placeholder="السعر/شيكل"
            class="form-control"
            >
           <br>
        </div>

        {{-- button --}}
        <div style="text-align: right">
          <button  class="btn btn-success w-25">اضافة</button>
        </div>

    </form>
@stop



