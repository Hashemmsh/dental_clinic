@extends('admin.master')
@section('title' , 'ادارة الفاتير الخارجية')
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
            <th>اسم الشركة</th>
            <th>المنتج</th>
            <th>الكمية</th>
            <th>السعر</th>
            <th>الأجمالي</th>
            <th>المدفوع</th>
            <th>المتبقي</th>
            <th>الحالة</th>
            <th>التاريخ</th>
            <th>الأدارة</th>
        </tr>
        <tbody>
        @foreach ($company_invoices as $company_invoice)
        <tr style="color: rgb(31, 25, 37)">
                <td>{{ $company_invoice->id }}</td>
                <td>{{ $company_invoice->invoice_number}}</td>
                <td>{{ $company_invoice->company_name}}</td>
                <td>
                    <a href="{{ url('Company_invoice_details') }}/{{ $company_invoice->id }}">
                        {{ $company_invoice->product }}</a>
                 </td>
                  <td>{{ $company_invoice->quantity }}</td>
                <td>{{ $company_invoice->price }}</td>
                <td>{{ $company_invoice->total }}</td>
                <td>{{ $company_invoice->paid }}</td>
                <td>{{ $company_invoice->remaining }}</td>
                <td>
                    @if ($company_invoice->value_status == 1)
                     <span class="badge badge-success">{{ $company_invoice->status }}</span>
                   @elseif($company_invoice->value_status == 2)
                     <span class="badge badge-danger">{{ $company_invoice->status }}</span>
                   @else
                     <span class="badge badge-warning">{{ $company_invoice->status }}</span>
                  @endif
                </td>
                <td>{{ $company_invoice->date }}</td>
                <td>
                    <form class="d-inline" action="{{ route('admin.company_invoices.destroy',$company_invoice->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('هل انت متأكد من الحذف')" class="btn btn-sm btn-danger"><i  class="fas fa-trash"></i></button>
                        </form>

                        <a class="btn btn-sm btn-primary" href="{{ route('admin.company_invoices.edit',$company_invoice->id) }}">
                            <i class="fas fa-edit" ></i></a>

                    <a class="btn btn-sm btn-info" href="{{ route('admin.company_invoices.show',$company_invoice->id) }}">
                    <i class="fa fa-eye" ></i></a>

                    <a class="btn btn-sm btn-success" href="{{ route('admin.company_status_show',$company_invoice->id) }}"><i class="fas fa-bell"></i></a>

                </td>
        </tr>
    </tbody>
        @endforeach
     </table>
    </div>
 </div>
</div>

@stop





