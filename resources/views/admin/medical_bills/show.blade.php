

@extends('admin.master')
@section('title' , 'ادارة الكشفيات')
@section('content')
<a href="{{ route('admin.print',$medical_bill->id) }}" class="btn btn-primary btn-sm ml-auto"><i class="fa fa-print"></i>طباعة</a>
<a class="btn btn-outline-secondary" href="{{ route('admin.medical_bills.index') }}">الى جميع الكشفيات</a>

<div  style="text-align: right">

    <div class="card-header" style="color: rgb(10, 10, 218)">كشفية المريض</div>

  <div class="card-body">
        <h5 class="mt-3" style="color: rgb(14, 14, 151)">الأسم :</h5> <h5 style="color: rgb(0, 0, 0)">{{ $medical_bill->patient->name }}</h5>
        <p class="mt-3" style="color: rgb(14, 14, 151)">اسم الدواء :</p><p style="color: rgb(0, 0, 0)"> {{ $medical_bill->medicine->name}}</p>
        <p class="mt-3"  style="color: rgb(14, 14, 151)">الروشيتة :</p><p style="color: rgb(0, 0, 0)"> {{ $medical_bill->prescription}}</p>
        <div>
            <strong style="color: black">الصورة :</strong>
            <img width="800" src="{{ asset('uploads/medical_bills/'.$medical_bill->image)}}"   alt="">
        </div>
        <hr>

  </div>
</div>

@stop

