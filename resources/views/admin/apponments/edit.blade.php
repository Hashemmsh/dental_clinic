
@extends('admin.master')
@section('title' , 'ادارة الحجوزات')
@section('content')

<h1  class="h3 mb-4 text-gray-800" style="text-align: right;">تعديل بيانات الحجز</h1>

@include('admin.errors')

<form action="{{ route('admin.apponment.update',$apponment->id) }}" method="POST">
      @csrf
      @method('put')

    {{-- patient --}}
    <div  class="col-md-6 " style="text-align: right">
            <label style="color: black">اسم المريض :</label>
            <select name="patient_id" class="form-control">
                <option value="">--اختر  المريض--</option>
                @foreach ($patients as $patient)
                <option {{ $apponment->patient_id == $patient->id ? 'selected' : "" }} value="{{ $patient->id }}">{{ $patient->name }}</option>

                @endforeach
            </select>
    </div>

<br>

    {{-- doctor --}}
    <div  class="col-md-6 " style="text-align: right">
            <label style="color: black">اسم الدكتور :</label>
            <select name="doctor_id" class="form-control">
                <option value="">--اختر  الدكتور--</option>
                @foreach ($doctors as $doctor)
                <option {{ $apponment->doctor_id == $doctor->id ? 'selected' : ""}} value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
    </div>

<br>

    {{-- date --}}
    <div class="col-md-6" style="text-align: right">
           <label style="color: black">موعد :</label>
            <input value="{{ $apponment->date }}" id="party" type="datetime-local" name="date" value="{{ $apponment->date }}"/>
    </div>

<br>

     {{-- note --}}
    <div class="col-md-6 " style="text-align: right">
            <label class="col-md-6 control-label" style="color: black" >ملاحظة السكرتير/ة :</label>
                <div >
                <div class="input-group">
                    @isset($apponment)
                    <textarea placeholder="ملاحظة"  class="form-control" name="note"
                     required>{{$apponment->note}}</textarea>
                   @else
                   <textarea  class="input-group-addon" name="note"  required></textarea>
                   @endIf
            </div>
            </div>
    </div>

<br>

    {{-- button --}}
    <div style="text-align: right">
          <button  class="btn btn-success w-25">تعديل</button>
    </div>

</form>

@stop


