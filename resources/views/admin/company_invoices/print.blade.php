
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
    				<h3 class="mb-3 my-5" style="text-align: right"><strong>رقم الفاتورة : {{ $company_invoices->invoice_number }}</strong></h3>
    			</div>
    			<div class="panel-body container">
    				<div class="table-responsive">
    					<table class="table table">
    						<thead>
                                <tr>
        							<td><strong>اسم الشركة</strong></td>
        							<td class="text-center"><strong>اسم المنتج</strong></td>
        							<td class="text-right"><strong>الأجمالي</strong></td>
        							<td class="text-right"><strong>المدفوع</strong></td>
        							<td class="text-right"><strong>المتبقي</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td>{{ $company_invoices->company_name }}</td>
    								<td class="text-center">{{ $company_invoices->product }}</td>
    								<td class="text-right">{{ $company_invoices->total}}</td>
    								<td class="text-right">{{ $company_invoices->paid}}</td>
    								<td class="text-right">{{ $company_invoices->remaining}}</td>
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
