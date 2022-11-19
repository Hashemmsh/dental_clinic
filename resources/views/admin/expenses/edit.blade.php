
@extends('admin.master')
@section('title' , 'ادارة المصاريف')
@section('content')

<div>
  <h1  class="h3 mb-4 text-gray-800 " style="text-align: right;">تعديل مصاريف</h1>
</div>

@include('admin.errors')

    <form action="{{ route('admin.expenses.update',$expense->id) }}" method="POST">
       @csrf
       @method('put')


        {{-- product --}}
        <div class="col-md-6" style="text-align: right">
            <div>
                <label style="color: black">اسم المنتج :</label>
                <input value="{{ $expense->product }}" type="text" name="product" placeholder="ادخل المنتج" class="form-control">
                <br>
            </div>
        </div>

        {{-- الكمية --}}
        <div style="text-align: right" class="col-md-6 ">
            <label class="control-label " style="color: black">الكمية</label>
            <input  value="{{ $expense->quantity }}" type="number" name="quantity" placeholder="الكمية"
            class="form-control quantity" min="1">
            <br>
        </div>


        {{-- السعر --}}
        <div style="text-align: right" class="col-md-6 ">
            <label class="control-label " style="color: black">السعر</label>
            <input value="{{ $expense->price }}" type="number" name="price" placeholder="السعر"
            class="form-control price">
            <br>
        </div>


            {{-- total --}}
            <div style="text-align: right" class="col-md-6 ">
                <label  class="control-label " style="color: black">الإجمالي :</label>
                <input value="{{ $expense->total }}" readonly name="total" class="form-control total"></input>
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
          <button  class="btn btn-success w-25">تعديل</button>
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
