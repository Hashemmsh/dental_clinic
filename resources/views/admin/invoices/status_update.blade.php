@extends('admin.master')
@section('content')
@section('title' , 'ادارة الفواتير')



    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.invoice_status_update', ['id'=>$invoice->id]) }}"
                        method="POST"
                        autocomplete="off">
                       @csrf


                  {{-- invoice number --}}
                    <div class="col-md-6" style="text-align: right">
                     <label class="control-label" style="color: black">رقم الفاتورة</label>
                        <input
                            type="hidden"
                            name="invoice_id"
                            value="{{ $invoice->id }}">
                        <input
                            type="text"
                            class="form-control"
                            name="invoice_number"
                            title="يرجي ادخال رقم الفاتورة" value="{{ $invoice->invoice_number }}"
                            readonly>
                            <br>
                    </div>

                    {{-- invoice_date --}}
                    <div class="col-md-6" style="text-align: right">
                        <label class="control-label" style="color: black">تاريخ الفاتورة</label>
                        <input class="form-control fc-datepicker" name="invoice_date" placeholder="YYYY-MM-DD"
                            type="text" value="{{ $invoice->invoice_date }}"  readonly>
                    </div>

                    {{-- services --}}
                    <div class="col-md-6"  style="text-align: right">
                        <label  class="control-label" style="color: black">الخدمة :</label>
                        <select name="service_id"
                        readonly
                        class="form-control selectpicker service-id"
                        data-live-search="true"
                        data-style="border-primary" readonly>
                            <!--placeholder-->
                            <option value="{{ $invoice->service_id }}">{{ $invoice->service->service }}</option>
                        </select>
                        <hr class="sidebar-divider mb-3">
                    </div>

                    {{-- price --}}
                    <div class="col-md-6" style="text-align: right">
                        <label  class="control-label" style="color: black">سعر الخدمة :</label>
                        <h5 class="price">0.00</h5>
                        <br>
                    </div>

                    {{-- laboratories --}}
                    <div class="col-md-6" style="text-align: right">
                        <label class="control-label" style="color: black">المعمل :</label>
                        <input
                        value="{{ $invoice->laboratories }}"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            value=0
                            type="text"
                            name="laboratories"
                            class="form-control laboratories"
                            readonly>
                            <br>
                    </div>

                    {{-- discount --}}
                    <div class="col-md-6" style="text-align: right">
                            <label  class="control-label" style="color: black">الخصم</label>
                            <input value="{{ $invoice->discount }}" type="text" class="form-control discount" name="discount"
                                title="يرجي ادخال مبلغ الخصم "
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                value="0" readonly>
                               <br>
                    </div>

                        {{-- total --}}
                      <div  class="col-md-6" style="text-align: right">
                            <label  class="control-label"  style="color: black">الإجمالي :</label>
                            <input value="{{ $invoice->total }}" readonly name="total" class="form-control total"></input>
                            <br>
                        </div>

                          {{-- note --}}
                    <div class="col-md-6" style="text-align: right">
                        <label  class="control-label"  style="color: black">ملاحظات :</label>
                        <textarea readonly class="form-control" id="exampleTextarea" name="note" rows="3" >
                        {{ $invoice->note }}</textarea>
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

                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary">تحديث حالة الدفع</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
@stop
@section('script')

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>
@endsection
