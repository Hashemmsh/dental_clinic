

@extends('admin.master')
@section('title' , 'ادارة الفواتير الخارجية')
@section('content')
@section('styles')
    <style>
        .table th,
        .table tr{
            vertical-align: middle;
        }
    </style>
@stop

<h1 class="h3 mb-4 text-gray-800" style="text-align: right">الأرشيف</h1>
    @if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
    {{ session('msg') }}
    </div>
    @endif

    <table class="table table-bordered table-striped table-hover" >
            <tr>
                <th>معرف</th>
                <th>رقم الفاتورة</th>
                <th>تاريخ الفاتورة</th>
                <th>الحالة</th>
            </tr>

            @foreach ($company_invoices as $company_invoice)
            <tr>
            <td>{{ $company_invoice->id }}</td>
            <td>{{ $company_invoice->invoice_number}}</td>
            <td>{{ $company_invoice->date }}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.company_invoices.restore',$company_invoice->id) }}">
                    <i class="fas fa-undo"></i></a>

                    <a onclick="return confirm('هل تريد الحذف نهائيا')" class="btn btn-sm btn-danger" href="{{ route('admin.company_invoices.forcedelete',$company_invoice->id) }}">
                        <i  class="fas fa-times"></i></a>
            </td>
        </tr>
            @endforeach
    </table>
@stop

