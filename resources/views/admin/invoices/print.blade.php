{{--
@extends('admin.print')

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
        .text
        {
            /* width: 600px */
        }
    }
/* @media (max-width: 480px) {
  .text {
    font-size: 16px;
    color: red
  }
} */
</style>
@endsection

<div class="text" >
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
</div>
    @section('scripts')
    <script>
        window.print();
    </script>
@endsection
@stop

 --}}







 @extends('admin.print')
 @section('content')
@section('styles')
<style>
    .invoice-title h2, .invoice-title h3 {
    display: inline-block;
}
table{
    width: 50%;
}



.table > tbody > tr > .no-line {
    border-top: none;

}

.table > thead > tr > .no-line {
    border-bottom: none;

}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>
@stop

    <div class="container">
        <div class="col-xs-12">
    <div class=" col-xs-6 ">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="mb-3 my-5" style="text-align: right"><strong>رقم الفاتورة : {{ $invoices->invoice_number }}</strong></h3>
    			</div>
    			<div class="panel-body container">
    				<div class="table-responsive">
    					<table class="table table">
    						<thead>
                                <tr>
        							<td><strong>اسم المريض</strong></td>
        							<td class="text-center"><strong>الخدمة</strong></td>
        							<td class="text-right"><strong>الأجمالي</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td>{{ $invoices->patient->name }}</td>
    								<td class="text-center">{{ $invoices->service->service }}</td>
    								<td class="text-right">{{ $invoices->total}}</td>
    							</tr>

    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
@section('scripts')

<script>
    window.print();
</script>
@stop


 @stop
