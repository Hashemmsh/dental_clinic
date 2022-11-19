
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
        <h6 class="m-0 font-weight-bold text-primary" style="text-align: right">جميع الفواتير</h6>
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
                     <span class="text-success">{{ $invoice->status }}</span>
                   @elseif($invoice->value_status == 2)
                     <span class="text-danger">{{ $invoice->status }}</span>
                   @else
                     <span class="text-warning">{{ $invoice->status }}</span>
                  @endif
                </td>
{{--
                <td>
                    <div class="dropdown">
                        <button aria-expanded="false" aria-haspopup="true"
                            class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                            type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
                        <div class="dropdown-menu">

                                <a class="dropdown-item  fas fa-edit"
                                    href=" {{ route('admin.invoices.edit', $invoice->id) }}">تعديل
                                    الفاتورة</a>

                            <form class="d-inline mb-3" action="{{ route('admin.invoices.destroy',$invoice->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('هل انت متأكد من الحذف')"  class="text-danger fas fa-trash"><i>حذف الفاتورة</i></button>
                                </form>






                                <a class="dropdown-item" href=""><i
                                        class="text-success fas fa-print"></i>&nbsp;&nbsp;طباعة
                                    الفاتورة
                                </a>
                        </div>
                    </div>

                </td> --}}
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

                    <a class="btn btn-sm btn-success" href="{{ route('admin.status_showw',$invoice->id) }}"><i class="fas fa-bell"></i></a>

                </td>
        </tr>
    </tbody>
        @endforeach
     </table>
    </div>
 </div>
</div>

@stop





