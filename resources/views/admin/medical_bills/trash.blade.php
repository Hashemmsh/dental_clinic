

@extends('admin.master')
@section('title' , 'ادارة الكشفيات')
@section('content')
@section('styles')
    <style>
        .table th,
        .table tr{
            vertical-align: middle;
        }
    </style>
@stop

<h1 class="h3 mb-4 text-gray-800" style="text-align: right">الكشفيات المحذوفة</h1>
    @if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
    {{ session('msg') }}
    </div>
    @endif

    <table class="table table-bordered table-striped table-hover" >
            <tr>
                <th>معرف</th>
                <th>الأسم</th>
                <th>الحالة</th>
            </tr>

            @foreach ($medical_bills as $medical_bill)
            <tr>
            <td>{{ $medical_bill->id }}</td>
            <td>{{ $medical_bill->patient->name}}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.medical_bills.restore',$medical_bill->id) }}">
                    <i class="fas fa-undo"></i></a>

                    <a onclick="return confirm('هل تريد الحذف نهائيا')" class="btn btn-sm btn-danger" href="{{ route('admin.medical_bills.forcedelete',$medical_bill->id) }}">
                        <i  class="fas fa-times"></i></a>
            </td>
        </tr>
            @endforeach
    </table>
@stop

