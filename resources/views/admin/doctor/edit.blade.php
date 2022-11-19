
@extends('admin.master')

@section('title' , 'ادارة الموظفين')

@section('content')
<div>
  <h1  class="h3 mb-4 text-gray-800" style="text-align: right;">تعديل بيانات الموظف</h1>
</div>

@include('admin.errors')

<form action="{{ route('admin.doctors.update',$doctor->id) }}" method="POST">
    @csrf
    @method('put')

    {{-- name --}}
    <div class="col-md-6" style="text-align: right">
            <div>
                <label style="color: black">اسم الموظف :</label>
                <input type="text" name="name" placeholder="ادخل الاسم" class="form-control" value="{{ $doctor->name }}">
                <br>

            </div>
    </div>

    {{-- gender --}}
    <div class="col-md-6 " style="text-align: right">
         <label style="color: black">الجنس :</label>
         <select  name="gender" autocomplete="gender" enterkeyhint="done" class="form-control">
            <option>{{ $doctor->gender }}</option>
            <option value="ذكر">ذكر</option>
            <option value="انثى">انثى</option>
         </select>
            <br>
    </div>

    {{-- address --}}
    <div class="col-md-6" style="text-align: right">
            <label style="color: black">العنوان</label>
            <select id="country" name="address" autocomplete="country" enterkeyhint="done" class="form-control">
                <option>{{ $doctor->address }}</option>
                <option value="رمال">غزة الرمال</option>
                <option value="تل الهوا">غزة تل الهوا</option>
                <option value="الشاطئ">غزة الشاطئ</option>
                <option value="الرمال">غزة الرمال</option>
                <option value="الصبرة">غزة الصبرة</option>
                <option value="الوحدة">غزة الوحدة</option>
                <option value="شيخ رضوان">غزة شيخ رضوان</option>
                <option value="عسقولة"> غزةعسقولة </option>
                <option value="الشجاعية">غزة الشجاعية</option>
                <option value="تفاح-درج">غزة تفاح-درج</option>
                <option value="الزيتون">غزة الزيتون</option>
                <option value="جباليا">غزة جباليا</option>
                <option value="خانوينس">غزة خانوينس</option>
                <option value="رفح">غزة رفح</option>
            </select>
           <br>
    </div>


    {{-- phone --}}
    <div class="col-md-6 " style="text-align: right">
            <label  style="color: black">الجوال :</label>
            <input value="{{ $doctor->phone }}" class="form-control" type="tel" name="phone" placeholder="059*******">
            <br>
    </div>

    {{-- email --}}
    <div class="col-md-6 " style="text-align: right">
                <label  style="color: black">البريد الألكتروني :</label>
                <input  value="{{ $doctor->email }}" class="form-control" type="email" name="email" placeholder="example@gamil.com">
               <br>
    </div>


    {{-- button --}}
    <div style="text-align: right">
        <button  class="btn btn-success w-25">تعديل</button>
    </div>

</form>
@stop



