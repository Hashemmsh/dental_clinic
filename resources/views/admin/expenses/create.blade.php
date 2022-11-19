
@extends('admin.master')
@section('title' , 'ادارةا لمصاريف')
@section('content')

<div>
  <h1  class="h3 mb-4 text-gray-800 " style="text-align: right;">اضافة مصاريف</h1>
</div>

@include('admin.errors')

    <form action="{{ route('admin.expenses.store') }}" method="POST">
       @csrf

        {{-- product --}}
        <div class="col-md-6" style="text-align: right">
            <div>
                <label style="color: black">اسم المنتج :</label>
                <input type="text" name="product" placeholder="ادخل المنتج" class="form-control">
                <br>
            </div>
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

            {{-- date --}}
            <div style="text-align: right" class="col-md-6 ">
                <label class="control-label" style="color: black" >تاريخ  :</label>
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
            var sum =quantity*price;
            document.querySelector(".total").value = sum;
    
        }

        $('body').on('keyup','.quantity',function(){
            showTotal()
        });
        $('body').on('keyup','.price',function(){
            showTotal()
        });
    })
</script>
@endsection



