
@extends('admin.master')
@section('title' , 'ادارة الفواتير')
@section('content')
@section('styles')

    <style>
        .table th,
        .table tr{
            vertical-align: middle;
        }
    </style>
@stop

            {{-- Export PDF patient and print --}}
            <div class="" style="text-align: center">
                <a class="btn btn-primary  btn-sm ml-auto" href="#"><i class="fas fa-file-pdf"></i>PDF</a>
            </div>
    <hr>

   @if (session('msg'))
      <div class="alert alert-{{ session('type') }}">
       {{ session('msg') }}
      </div>
   @endif
 <div class="card shadow mb-4">


    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="text-align: right">الفواتير المدفوعة</h6>
        <hr>
    </div>
 <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr style="color: rgb(58, 18, 216)">
            <th>#</th>
            <th>رقم الفاتورة</th>
            <th>تاريخ الفاتورة</th>
            <th>اسم المريض</th>
            <th>الخدمة</th>
            <th>سعر الخدمة</th>
            <th>المعمل</th>
            <th>الخصم</th>
            <th>مجموع المبلغ</th>
            <th>الحالة</th>
            <th>الأدارة</th>
        </tr>
        <tbody>
        @foreach ($invoices as $invoice)

        <tr style="color: rgb(31, 25, 37)">
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->invoice_number}}</td>
                <td>{{ $invoice->invoice_date}}</td>
                <td>{{ $invoice->patient->name }}</td>
                  <td>
                    <a href="{{ url('InvoiceDetails') }}/{{ $invoice->id }}">
                        {{ $invoice->service->service }}</a>
                 </td>
                <td>{{ $invoice->service->price }}</td>
                <td>{{ $invoice->laboratories }}</td>
                <td>{{ $invoice->discount }}</td>
                <td>{{ $invoice->total }}</td>
                <td>
                    @if ($invoice->value_status == 1)
                     <span class="badge badge-success">{{ $invoice->status }}</span>
                   @elseif($invoice->value_status == 2)
                     <span class="badge badge-danger">{{ $invoice->status }}</span>
                   @else
                     <span class="badge badge-warning">{{ $invoice->status }}</span>
                  @endif
                </td>
                <td>
                    <form class="d-inline" action="{{ route('admin.invoices.destroy',$invoice->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('هل انت متأكد من الحذف')" class="btn btn-sm btn-danger"><i  class="fas fa-trash"></i></button>
                        </form>

                        <a class="btn btn-sm btn-primary" href="{{ route('admin.invoices.edit',$invoice->id) }}">
                            <i class="fas fa-edit" ></i></a>

                    <a class="btn btn-sm btn-info" href="{{ route('admin.invoices.show',$invoice->id) }}">
                    <i class="fa fa-eye" ></i></a>

                    <a class="btn btn-sm btn-success" href="{{ route('admin.invoice_status_show',$invoice->id) }}"><i class="fas fa-bell"></i></a>

                </td>
        </tr>
    </tbody>
        @endforeach
     </table>
    </div>
 </div>
</div>

@stop





