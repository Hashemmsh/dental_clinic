
@extends('admin.master')

@section('title' , 'ادارة الفواتير')

@section('content')

<div>
    <h1 style="text-align: right" class="h mb-4 text-gray-900">تعديل فاتورة </h1>
  <hr>
</div>

@include('admin.errors')
    <form id="invoice" action="{{ route('admin.invoices.update' , $invoice->id) }}" method="POST">
    @csrf
    @method('put')

        {{-- invoice_number --}}
        <div class="col-md-6" style="text-align: right">
           <div class="col">
            <label  class="control-label" style="color: black">رقم الفاتورة :</label>
            <input
            value="{{ $invoice->invoice_number }}"
            placeholder="رقم الفاتورة"
              type="text"
              class="form-control"
              name="invoice_number"
              >
              <hr class="sidebar-divider mb-3">
        </div>

        {{-- invoice_date --}}
        <div class="col">
            <label class="control-label" style="color: black">تاريخ الفاتورة :</label>
            <input
              class="form-control fc-datepicker"
              name="invoice_date"
              placeholder="YYYY-MM-DD"
              type="text"
              value="{{ date('Y-m-d') }}">
              <hr class="sidebar-divider mb-3">
        </div>

        {{-- Patient --}}
        <div class="col"  style="text-align: right">
          <label style="color: black">اسم المريض :</label>
            <select id="patient-dropdown"  name="patient_id" class="form-control">
                 <option value="">اختر المريض</option>
                    @foreach ($patients as $patient)
                    <option {{ $invoice->patient_id == $patient->id ? 'selected' : '' }} value="{{ $patient->id }}">{{ $patient->name }}</option>

                    @endforeach
            </select>
          <hr class="sidebar-divider mb-3">
        </div>


             {{-- services --}}
        <div class="col"  style="text-align: right">
                <label  class="control-label" style="color: black">الخدمة :</label>
                <select name="service_id"
                class="form-control selectpicker service-id"
                data-live-search="true"
                data-style="border-primary">
                    <!--placeholder-->
                    <option value="" class="default-select" data-service-price="0.00">اختر الخدمة</option>
                      @foreach ($services as $service)
                        <option value="{{ $service->id }}" data-service-price="{{ $service->price }}"> {{ $service->service }}</option>
                      @endforeach
                </select>
                <hr class="sidebar-divider mb-3">
        </div>

          {{-- price --}}
          <div class="col" style="text-align: right">
            <label  class="control-label" style="color: black">سعر الخدمة :</label>
              <h5 class="price">0.00</h5>
             <hr class="sidebar-divider mb-3">
        </div>

        {{-- laboratories --}}
        <div class="col" style="text-align: right">
            <label class="control-label" style="color: black">المعمل :</label>
            <input
            value="{{ $invoice->laboratories }}"
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                value=0
                type="text"
                name="laboratories"
                class="form-control laboratories"
                >
                <hr class="sidebar-divider mb-3">
        </div>

        {{-- discount --}}
        <div class="col" style="text-align: right">
            <label  class="control-label" style="color: black">الخصم</label>
            <input value="{{ $invoice->discount }}" type="text" class="form-control discount" name="discount"
                title="يرجي ادخال مبلغ الخصم "
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                value="0">
                <hr class="sidebar-divider mb-3">
        </div>

        {{-- total --}}
        <div  class="col" style="text-align: right">
            <label  class="control-label"  style="color: black">الإجمالي :</label>
            <input value="{{ $invoice->total }}" readonly name="total" class="form-control total"></input>
            <hr class="sidebar-divider mb-3">
        </div>

        {{-- paid --}}
        <div class="col" style="text-align: right">
        <label  class="control-label" style="color: black">المدفوع :</label>
        <input
        value="{{ $invoice->paid }}"
                name="paid"
                class="form-control paid"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
        </input>
        <br>
        </div>


                {{-- remaining --}}
        <div class="col" style="text-align: right">
            <label  class="control-label" style="color: black">المتبقي :</label>
            <input
            readonly
            name="remaining"
            class="form-control remaining"></input>
            <br>
        </div>

         {{-- button --}}
        <div style="text-align: right">
          <button  class="btn btn-success w-25">تعديل</button>
        </div>

    </form>

@stop

@section('script')
<script>
    $(document).ready(function() {

        function showTotal() {
            var price = parseFloat(document.querySelector(".price").innerHTML);
            var laboratories = parseFloat(document.querySelector(".laboratories").value);
            var discount = parseFloat(document.querySelector(".discount").value);
            var paid = parseFloat(document.querySelector(".paid").value);
            var sum = price + laboratories - discount;
            document.querySelector(".total").value = sum;
            var paidd = sum-paid;
            document.querySelector(".remaining").value=paidd;
        }

        $('body').on('keyup','.paid',function(){
            showTotal()
        });


        $('body').on('keyup','.discount',function(){
            showTotal()
        });

        $('body').on('keyup','.laboratories',function(){
            showTotal()
        });

        $( ".service-id" )
            .change(function() {
                var str = "";
                $( ".service-id option:selected" ).each(function() {
                    str += $( this ).data("service-price") + " ";
                });
                $('.price').html(str)
                showTotal()
            })
            .trigger( "change" );
    })
</script>

@stop
