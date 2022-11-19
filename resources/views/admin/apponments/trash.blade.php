
@extends('admin.master')
@section('title' , 'ادارة الحجوزات')
@section('content')
@section('styles')
    <style>
        .table th,
        .table tr{
            vertical-align: middle;
        }
    </style>
@stop

<h1 class="h3 mb-4 text-gray-800 text-primary" style="text-align: right">الحجوزات المحذوفة</h1>
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

            @foreach ($apponments as $apponment)
        <tr>
            <td>{{ $apponment->id }}</td>
            <td>{{ $apponment->patient->name}}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.apponments.restore',$apponment->id) }}">
                    <i class="fas fa-undo"></i></a>
                <a onclick="return confirm('هل تريد الحذف نهائيا')" class="btn btn-sm btn-danger" href="{{ route('admin.apponments.forcedelete',$apponment->id) }}">
                    <i  class="fas fa-times"></i></a>
            </td>
        </tr>
            @endforeach
    </table>
@stop

