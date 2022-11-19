
@extends('admin.master')

@section('title' , 'ادارة الفواتير الخارجية')

@section('content')



<div>

    <h1 style="text-align: right" class="h mb-4 text-gray-900">تعديل الفاتورة</h1>
    <a class="btn btn-outline-secondary" href="{{ route('admin.company_invoices.index') }}">الى جميع الفواتير</a>

  <hr>
</div>

@include('admin.errors')
    <form id="company_invoice" action="{{ route('admin.company_status_update', ['id'=>$company_invoice->id]) }}" autocomplete="off" method="POST">
    @csrf

        {{-- invoice_number --}}
        <div style="text-align: right" class="col-md-6 ">
                <label  class="control-label" style="color: black">رقم الفاتورة :</label>
                <input
                type="hidden"
                name="company_invoice_id"
                value="{{ $company_invoice->id }}">
            <input
                type="text"
                class="form-control"
                name="invoice_number"
                title="يرجي ادخال رقم الفاتورة" value="{{ $company_invoice->invoice_number }}"
                readonly>
                <br>
        </div>

                 {{-- invoice_date --}}
        <div class="col-md-6" style="text-align: right">
            <label class="control-label" style="color: black">تاريخ الفاتورة</label>
            <input class="form-control fc-datepicker" name="invoice_date" placeholder="YYYY-MM-DD"
                type="text" value="{{ $company_invoice->date }}"  readonly>
        </div>


        {{-- company_name --}}
        <div style="text-align: right" class="col-md-6 ">
             <label  class="control-label" style="color: black">اسم الشركة :</label>
             <input
             value="{{ $company_invoice->company_name }}"
             placeholder="اسم الشركة"
               type="text"
               class="form-control"
               name="company_name"
               readonly>
               <br>
        </div>

        {{-- product --}}
            <div style="text-align: right" class="col-md-6 ">
                <label class="control-label" style="color: black">اسم المنتج :</label>
                <input value="{{ $company_invoice->product }}"
                type="text"
                name="product"
                placeholder="اسم المنتج"
                class="form-control" readonly>
                    <br>
            </div>


        {{-- الكمية --}}
        <div style="text-align: right" class="col-md-6 ">
            <label class="control-label" style="color: black">الكمية</label>
            <input  type="number" name="quantity" value="{{ $company_invoice->quantity }}" placeholder="الكمية"
            class="form-control" min="1" readonly>
            <br>
        </div>

        {{-- السعر --}}
        <div style="text-align: right" class="col-md-6 ">
            <label class="control-label" style="color: black">السعر</label>
            <input  type="number" name="price" placeholder="السعر"
            value="{{ $company_invoice->price }}"
            class="form-control" readonly>
            <br>
        </div>

            {{-- total --}}
       <div style="text-align: right" class="col-md-6 ">
            <label  class="control-label" style="color: black">الإجمالي :</label>
            <input value="{{ $company_invoice->total }}"  name="total" class="form-control total" readonly></input>
            <br>
       </div>

                   {{-- paid --}}
                   <div style="text-align: right" class="col-md-6 ">
                     <label  class="control-label" style="color: black">المدفوع :</label>
                     <input
                      readonly
                      value="{{ $company_invoice->paid }}"
                      name="paid"
                      class="form-control paid"
                      oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                      </input>
                      <br>
                    </div>


                    {{-- remaining --}}
                    <div style="text-align: right" class="col-md-6 ">
                    <label  class="control-label" style="color: black">المتبقي :</label>
                    <input
                    value="{{ $company_invoice->remaining }}"
                    readonly
                    name="remaining"
                    class="form-control remaining"></input>
                    <br>
                    </div>

        {{-- invoice_date --}}
        <div style="text-align: right" class="col-md-6 ">
            <label class="control-label" style="color: black" >تاريخ الفاتورة :</label>
            <input
            readonly
              class="form-control fc-datepicker"
              name="date"
              placeholder="YYYY-MM-DD"
              type="date"
              value="{{ date('Y-m-d') }}">
            <br>
        </div>

            {{-- note --}}
        <div class="col-md-6" style="text-align: right">
            <label  class="control-label"  style="color: black">ملاحظات :</label>
            <textarea readonly class="form-control" id="exampleTextarea" name="note" rows="3" >
            {{ $company_invoice->note }}</textarea>
        </div>
                                    <br>

                                    <div class="row">
                                        <div class="col">
                                            <label for="exampleTextarea" style="color: black">حالة الدفع :</label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option selected="true" disabled="disabled">-- حدد حالة الدفع --</option>
                                                <option value="مدفوعة">مدفوعة</option>
                                                <option value="مدفوعة جزئيا">مدفوعة جزئيا</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <label>تاريخ الدفع</label>
                                            <input
                                                class="form-control fc-datepicker"
                                                name="payment_date"
                                                placeholder="YYYY-MM-DD"
                                                type="date" required>
                                        </div>
                                    </div>
                                                    <br>

         {{-- button --}}
         <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">تحديث حالة الدفع</button>
        </div>


    </form>

@stop

@section('script')

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>
@endsection
