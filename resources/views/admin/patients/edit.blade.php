
 @extends('admin.master')
 @section('title' , 'ادارة المرضى')
 @section('content')

  <h1 class="h3 mb-4 text-gray-800" style="text-align: right">تعديل بيانات المريض</h1>

  @include('admin.errors')

<form action="{{ route('admin.patients.update',$patient->id) }}" method="POST">
    @csrf
    @method('put')

    {{-- name --}}
    <div class="col-md-6" style="text-align: right">
            <div>
                <label style="color: black">اسم المريض :</label>
                <input type="text" name="name" placeholder="ادخل الاسم" class="form-control" value="{{ $patient->name }}">
                <br>

            </div>
    </div>

    {{-- age --}}
    <div  class="col-md-6 " style="text-align: right">
            <label style="color: black">العمر :</label>
            <input value="{{ $patient->age }}"  type="number" name="age" placeholder="age"
            class="form-control">

            <br>

    </div>

    {{-- gender --}}
    <div class="col-md-6 " style="text-align: right">
        <label style="color: black">الجنس :</label>
        <select name="gender" autocomplete="gender" enterkeyhint="done" class="form-control">
            <option>{{ $patient->gender }}</option>
           <option value="ذكر">ذكر</option>
           <option value="انثى">انثى</option>
        </select>
           <br>
    </div>

    {{-- phone --}}
    <div class="col-md-6 " style="text-align: right">
            <label  style="color: black">الجوال :</label>
            <input value="{{ $patient->phone }}" class="form-control" type="tel" name="phone" placeholder="059*******">
            <br>
    </div>

    {{-- العنوان --}}
    <div class="col-md-6" style="text-align: right">
        <label style="color: black">العنوان</label>
        <select id="country" name="address" autocomplete="country" enterkeyhint="done" class="form-control">
            <option>{{ $patient->address }}</option>
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


    {{-- image --}}
    <div  class="col-md-6" style="text-align: right">
                <label style="color: black"> الصورة :</label>
                <input value="{{ $patient->image }}" type="file" name="image"
                 class="form-control">
                 <td><img  width="70" src="{{ asset('uploads/patients/'.$patient->image) }}"  alt=""></td>
                 <br>

    </div>

    {{-- note --}}
    <div class="col-md-6" style="text-align: right">
            <label class="col-md-6 control-label" style="color: black" >ملاحظة :</label>
                <div>
                <div class="input-group">
                    @isset($patient)
                    <textarea placeholder="ملاحظة"  class="form-control" name="note"
                     required>{{$patient->note}}</textarea>
                   @else
                   <textarea  class="input-group-addon" name="note"  required></textarea>
                   @endIf
            </div>
            </div>
            <br>
    </div>

     {{-- doctor --}}
    <div  class="col-md-6 " style="text-align: right">
           <label style="color: black">اسم الدكتور :</label>
          <select name="doctor_id" class="form-control">
            <option value="">--اختر  الدكتور--</option>
            @foreach ($doctors as $doctor)
           <option {{ $patient->doctor_id == $doctor->id ? 'selected' : '' }} value="{{ $doctor->id }}">{{ $doctor->name }}</option>
           @endforeach
         </select>
         <br>
    </div>

    {{-- button --}}
    <div style="text-align: right">
          <button  class="btn btn-success w-25">تعديل</button>
    </div>

</form>

@stop


