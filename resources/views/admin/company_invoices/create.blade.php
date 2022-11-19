
@extends('admin.master')

@section('title' , 'ادارة الفواتير الخارجية')

@section('content')



<div>
    <h1 style="text-align: right" class="h mb-4 text-gray-900">اضافة فاتورة خارجية </h1>
  <hr>
</div>

@include('admin.errors')
    <form id="company_invoice" action="{{ route('admin.company_invoices.store') }}" method="POST">
    @csrf


            {{-- invoice_number --}}
            <div style="text-align: right" class="col-md-6 ">
            <label  class="control-label" style="color: black">رقم الفاتورة :</label>
            <input
            placeholder="رقم الفاتورة"
            type="text"
            class="form-control"
            name="invoice_number"
            >
            <br>
            </div>


            {{-- company_name --}}
            <div style="text-align: right" class="col-md-6 ">
            <label  class="control-label" style="color: black">اسم الشركة :</label>
            <input
            placeholder="اسم الشركة"
            type="text"
            class="form-control"
            name="company_name"
            >
            <br>
            </div>

            {{-- product --}}
            <div style="text-align: right" class="col-md-6 ">
            <label class="control-label" style="color: black">اسم المنتج :</label>
            <input type="text" name="product" placeholder="اسم المنتج" class="form-control">
            <br>
            </div>


            {{-- الكمية --}}
            <div style="text-align: right" class="col-md-6 ">
            <label class="control-label " style="color: black">الكمية</label>
            <input  type="number" name="quantity" placeholder="الكمية"
            class="form-control quantity" min="1">
            <br>
            </div>

            {{-- السعر --}}
            <div style="text-align: right" class="col-md-6 ">
            <label class="control-label " style="color: black">السعر</label>
            <input  type="number" name="price" placeholder="السعر"
            class="form-control price">
            <br>
            </div>

            {{-- total --}}
            <div style="text-align: right" class="col-md-6 ">
             <label  class="control-label " style="color: black">الإجمالي :</label>
             <input  readonly name="total" class="form-control total"></input>
             <br>
            </div>

            {{-- paid --}}
            <div style="text-align: right" class="col-md-6 ">
            <label  class="control-label" style="color: black">المدفوع :</label>
            <input
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
            readonly
            name="remaining"
            class="form-control remaining"></input>
            <br>
            </div>

            {{-- invoice_date --}}
            <div style="text-align: right" class="col-md-6 ">
            <label class="control-label" style="color: black" >تاريخ الفاتورة :</label>
            <input
            class="form-control fc-datepicker"
            name="date"
            placeholder="YYYY-MM-DD"
            type="date"
            value="{{ date('Y-m-d') }}">
            <br>
            </div>

            {{-- button --}}
            <div style="text-align: right">
             <button  class="btn btn-success w-25">اضافة</button>
            </div>

    </form>

@stop
@section('script')


<script>
    $(document).ready(function() {

        function showTotal() {
            var quantity = parseFloat(document.querySelector(".quantity").value);
            var price = parseFloat(document.querySelector(".price").value);
            var paid = parseFloat(document.querySelector(".paid").value);
            var sum =quantity*price;
            document.querySelector(".total").value = sum;
            var paidd = sum-paid;
            document.querySelector(".remaining").value=paidd;
        }

        $('body').on('keyup','.quantity',function(){
            showTotal()
        });
        $('body').on('keyup','.price',function(){
            showTotal()
        });
        $('body').on('keyup','.paid',function(){
            showTotal()
        });

    })
</script>
@endsection


