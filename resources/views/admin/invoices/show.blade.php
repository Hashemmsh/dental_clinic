@extends('admin.master')
@section('title' , 'ادارة الفواتير')
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

<a href="{{ route('admin.invoices.print',$invoices->id) }}" class="btn btn-primary btn-sm ml-auto"><i class="fa fa-print"></i>طباعة</a>

    <h1 id="invoice" class="invoice-title">فاتورة المريض</h1>
        <hr>
        <br>
    <div class="to">
        <h5>رقم الفاتورة : {{ $invoices->invoice_number }}</h5>
        <br>
        <h5>اسم المريض :  {{ $invoices->patient->name }}</h5>
        <br>
        <h5>الخدمة : {{ $invoices->service->service }}</h5>
        <br>
        <h5>الأجمالي : {{ $invoices->total }}</h5>
    </div>



    @section('scripts')
    <script>
     window.print();
    </script>
    @stop


@stop
