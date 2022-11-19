
@extends('admin.master')
@section('title' , 'ادارة المرضى')
@section('content')

<div class="navbar-header" style="text-align: left">
    <a class="btn btn-outline-secondary" href="{{ route('admin.patients.index') }}">الى جميع المرضى</a>
</div>
<div class="card" style="text-align: right">
    <div class="card-header">صفحة المريض</div>

    <div class="card-body">

        <h5 class="card-title" style="color: black">الأسم : </h5> <h5 style="color:rgb(11, 37, 208)">{{$patient->name }}</h5>
        <p class="card-text" style="color: black">العمر : </p> <p style="color: rgb(11, 37, 208)">{{ $patient->age }}</p>
        <p class="card-text" style="color: black">الجنس :</p> <p style="color: rgb(11, 37, 208)"> {{ $patient->gender }}</p>
        <p class="card-number" style="color: black">الجوال :</p> <p style="color: rgb(11, 37, 208)">{{ $patient->phone }}</p>
        <p class="card-text" style="color: black">العنوان : </p> <p style="color: rgb(11, 37, 208)">{{ $patient->address }}</p>
        <p class="card-text" style="color: black">ملاحظة الطبية :</p> <p style="color: rgb(11, 37, 208)"> {{ $patient->note }}</p>
        <p  class="card-text" style="color: black">اسم الدكتور :</p> <p style="color: rgb(11, 37, 208)">{{ $patient->doctor->name}}</p>
        <div>
            <strong style="color: black">الصورة :</strong>
            <img width="800" src="{{ asset('uploads/patients/'.$patient->image)}}"   alt="">
        </div>
        <hr>

    </div>


</div>


@stop
