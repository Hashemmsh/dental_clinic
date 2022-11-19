
@extends('admin.master')
@section('title' , 'ادارة الموظفين')
@section('content')


<div class="navbar-header" style="text-align: left">
    <a class="btn btn-outline-secondary" href="{{ route('admin.doctors.index') }}">الى جميع الموظفين</a>
</div>
<div class="card" style="text-align: right">
    <div class="card-header text-primary" >صفحة الموظف</div>


    <div class="card-body">
        <h5 class="card-title" style="color: black">الأسم : </h5> <h5>({{$doctor->name }})</h5>
        <p class="card-text" style="color: black">الجنس : </p> <p>({{ $doctor->gender }})</p>
        <p class="card-text" style="color: black">العنوان :</p> <p> ({{ $doctor->address }})</p>
        <p class="card-number" style="color: black">الجوال :</p> <p>({{ $doctor->phone }})</p>
        <p class="card-text" style="color: black">البريد الالكتروني :</p> <p> ({{ $doctor->email }})</p>
    </div>


</div>


@stop
