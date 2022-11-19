
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
  <h1  class="h3 mb-4 text-gray-800" style="text-align: right;">تعديل الخدمة المتاحة</h1>
</div>

@include('admin.errors')

<form action="{{ route('admin.services.update',$service->id) }}" method="POST">
    @csrf
    @method('put')

    {{-- service --}}
    <div class="col-md-6" id="di">
        <div>
            <label id="la">اسم الخدمة :</label>
                <input
                  value="{{ $service->service }}"
                  type="text"
                  name="service"
                  placeholder="ادخل الخدمة"
                  class="form-control">
                <br>
            </div>
    </div>

     {{-- description --}}
    <div  class="col-md-6" id="di">
        <label  id="la">تفاصيل الخدمة  :</label>
            <div>
            <div class="input-group">
                @isset($service)
                <textarea placeholder="تفاصيل الخدمة"  class="form-control" name="description"
                 required>{{$service->description}}</textarea>
               @else
               <textarea  class="input-group-addon" name="description"  required></textarea>
               @endIf
        </div>
        </div>
        <br>
    </div>

    {{-- price --}}
    <div class="col-md-6 " id="di">
        <label id="la">سعر الخدمة  :<i class="fas fa-shekel-sign"></i></label>
            <input
             value="{{ $service->price }}"
             min="1"
             type="number"
             name="price"
             placeholder="السعر/شيكل"
             class="form-control"
            >
            <br>
    </div>

    {{-- button --}}
    <div style="text-align: right">
        <button  class="btn btn-success w-25">تعديل</button>
    </div>

</form>
@stop



