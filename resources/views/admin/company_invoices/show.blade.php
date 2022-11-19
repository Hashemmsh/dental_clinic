@extends('admin.master')
@section('title' ,'ادارة الفواتير الخارجية')
@section('content')
@section('styles')
<style>
    #invoice{
        text-align: right;
    }
    .to{
        text-align: center;
        color: black;
    }

</style>
<style>
    @media print {
        #print_Button {
            display: none;
        }
    }
</style>
@endsection

<a href="{{ route('admin.company_print',$company_invoices->id) }}" class="btn btn-primary btn-sm ml-auto"><i class="fa fa-print"></i>طباعة</a>
<a class="btn btn-outline-secondary" href="{{ route('admin.company_invoices.index') }}">الى جميع الفواتير</a>

    <h1 id="invoice" class="invoice-title">فاتورة خارجية</h1>
        <hr>
        <br>
    <div class="to">
        <h5>رقم الفاتورة : {{ $company_invoices->invoice_number }}</h5>
        <br>
        <h5>اسم الشركة :  {{ $company_invoices->company_name }}</h5>
        <br>
        <h5>اسم المنتج : {{ $company_invoices->product}}</h5>
        <br>
        <h5>الأجمالي : {{ $company_invoices->total }}</h5>
        <br>
        <h5>المدفوع : {{ $company_invoices->paid }}</h5>
        <br>
        <h5>المتبقي: {{ $company_invoices->remaining }}</h5>
    </div>



    @section('scripts')
     <script>
      window.print();
     </script>
    @stop


@stop
