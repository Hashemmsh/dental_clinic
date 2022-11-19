
@extends('admin.master')

@section('title' , 'ادارة المرضى')

@section('content')

<div>
    <h1 style="text-align: right" class="h mb-4 text-gray-900">اضافة مريض جديد</h1>
  <hr>
</div>

@include('admin.errors')
    <form action="{{ route('admin.patients.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

        {{-- name --}}
        <div class="col-md-6" style="text-align: right">
            <div>
                <label style="color: black">اسم المريض :</label>
                <input type="text" name="name" placeholder="ادخل الاسم" class="form-control">
               <br>

            </div>
        </div>

        {{-- age --}}
        <div  class="col-md-6 " style="text-align: right">
            <label style="color: black">العمر :</label>
            <input  type="number" name="age" placeholder="age"
            class="form-control">

            <br>

        </div>

        {{-- gender --}}
        <div class="col-md-6 " style="text-align: right">
            <label style="color: black">الجنس :</label>
            <select name="gender" autocomplete="gender" enterkeyhint="done" class="form-control">
                <option value="">الجنس</option>
               <option value="ذكر">ذكر</option>
               <option value="انثى">انثى</option>
            </select>
               <br>
        </div>


        {{-- phone --}}
        <div class="col-md-6 " style="text-align: right">
                <label  style="color: black">الجوال :</label>
                <input  class="form-control" type="tel" name="phone" placeholder="059*******">
                <br>
        </div>

        {{-- العنوان --}}
        <div class="col-md-6" style="text-align: right">
            <label style="color: black">العنوان</label>
            <select id="country" name="address" autocomplete="country" enterkeyhint="done" class="form-control">
                <option></option>
                <option value="الرمال">غزة الرمال</option>
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

         {{-- Image --}}
        <div class="col-md-6" style="text-align: right">
            <label style="color: black">الصورة :</label>
            <input type="file" name="image" class="form-control">
            <br>
        </div>


        {{-- note --}}
        <div class="col-md-6" style="text-align: right">
            <label class="col-md-6 control-label" style="color: black" >ملاحظات طبية :</label>
                <div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <textarea class="form-control" name="note" placeholder="تفاصيل اضافية"></textarea>
            </div>
            </div>
            <br>
        </div>

         {{-- Doctor --}}
         <div  class="col-md-6" style="text-align: right">
            <label style="color: black">دكتور الحالة :</label>
            <select name="doctor_id" class="form-control">
                <option value="">--اختر الدكتور--</option>
                @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}">
                    {{ $doctor->name }}</option>
                @endforeach
            </select>
            <br>
         </div>

         {{-- button --}}
        <div style="text-align: right">
          <button  class="btn btn-success w-25">اضافة</button>
        </div>


    </form>
@stop




        {{-- <div class="col-md-6" style="text-align: right">
            <label style="color: black">تاريخ الميلاد :</label>
            <input type="date"  name="birthday">
        </div> --}}


