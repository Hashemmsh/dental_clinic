
@extends('admin.master')
@section('title' , 'ادارة الأدوية')
@section('content')

<h1  class="h3 mb-4 text-gray-800 " style="text-align: right;">اضافة دواء</h1>
@include('admin.errors')
    <form action="{{ route('admin.medicines.store') }}" method="POST">
    @csrf

        {{-- name --}}
        <div class="col-md-6" style="text-align: right">
            <div>
                <label style="color: black">اسم الدواء :</label>
                <input type="text" name="name" placeholder="ادخل الاسم" class="form-control">
                <hr class="sidebar-divider mb-3">

            </div>
        </div>

        {{-- indictions --}}
        <div class="form-group" style="text-align: right">
            <label class="col-md-6 control-label" style="color: black" > دواعي الأستعمال:</label>
              <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                      <textarea class="form-control" name="indictions" placeholder="دواعي الأستعمال"></textarea>
            </div>
            </div>
            <hr class="sidebar-divider mb-3">
        </div>

           {{-- symptoms --}}
        <div class="form-group" style="text-align: right">
            <label class="col-md-6 control-label" style="color: black" > أعراض الدواء :</label>
              <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                      <textarea class="form-control" name="symptoms" placeholder="الأعراض"></textarea>
            </div>
            </div>
            <hr class="sidebar-divider mb-3">
        </div>

        {{-- symptoms --}}

        {{-- details --}}
        <div class="form-group" style="text-align: right">
            <label class="col-md-6 control-label" style="color: black" >  تفاصيل اضافية :</label>
                <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <textarea class="form-control" name="details" placeholder="تفاصيل اضافية"></textarea>
            </div>
            </div>
            <hr class="sidebar-divider mb-3">
        </div>


           {{-- Doctor --}}
           <div  class="col-md-6" style="text-align: right">
             <label style="color: black">دكتور المضيف :</label>
             <select name="doctor_id" class="form-control">
                <option value="">--اختر المضيف--</option>
                @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}">
                    {{ $doctor->name }}</option>
                @endforeach
            </select>
           </div>

<hr>


                {{-- button --}}
        <div style="text-align: right">
        <button  class="btn btn-success w-25">اضافة</button>
        </div>

    </form>
@stop


