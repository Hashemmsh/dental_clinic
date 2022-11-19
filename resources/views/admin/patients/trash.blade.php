

@extends('admin.master')
@section('title' , 'ادارة المرضى')
@section('content')
@section('styles')
    <style>
        .table th,
        .table tr{
            vertical-align: middle;
        }
    </style>
@stop

<h1 class="h3 mb-4 text-gray-800" style="text-align: right">المرضى المحذوفين</h1>
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

            @foreach ($patients as $patient)
            <tr>
            <td>{{ $patient->id }}</td>
            <td>{{ $patient->name}}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.patients.restore',$patient->id) }}">
                    <i class="fas fa-undo"></i></a>

                    <a onclick="return confirm('هل تريد الحذف نهائيا')" class="btn btn-sm btn-danger" href="{{ route('admin.patients.forcedelete',$patient->id) }}">
                        <i  class="fas fa-times"></i></a>
            </td>
        </tr>
            @endforeach
    </table>
@stop

