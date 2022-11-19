
@extends('admin.master')
@section('title' , 'ادارة الخدمات')
@section('content')
@section('styles')
    <style>
        .table th,
        .table tr{
            vertical-align: middle;
        }
    </style>
@stop

<h1 class="h3 mb-4 text-gray-800 text-primary" style="text-align: right">الخدمات المحذوفة</h1>
    @if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
    {{ session('msg') }}
    </div>
    @endif

    <table class="table table-bordered table-striped table-hover" >
            <tr>
                <th>معرف</th>
                <th>الخدمة</th>
                <th>الحالة</th>
            </tr>

            @foreach ($services as $service)
            <tr>
            <td>{{ $service->id }}</td>
            <td>{{ $service->service}}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.services.restore',$service->id) }}">
                    <i class="fas fa-undo"></i></a>

                    <a onclick="return confirm('هل تريد الحذف نهائيا')" class="btn btn-sm btn-danger" href="{{ route('admin.services.forcedelete',$service->id) }}">
                        <i  class="fas fa-times"></i></a>
            </td>
        </tr>
            @endforeach
    </table>
@stop

