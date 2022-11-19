
@extends('admin.master')
@section('title' , 'ادارة المصاريف')
@section('content')

    @if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
    {{ session('msg') }}
    </div>
    @endif
<div class="card shadow mb-4">
        <div class="card-header py-3"  style="text-align: right">
           <h6 class="m-0 font-weight-bold text-primary">جميع المصاريف</h6>
           <div class="" style="text-align: center">
            <a class="btn btn-primary  btn-sm ml-auto" href="#"><i class="fas fa-file-pdf"></i>PDF</a>
            <a href="{{ route('admin.expenses_print') }}" class="btn btn-primary btn-sm ml-auto"><i class="fa fa-print"></i>Print</a>
        </div>
        </div>


  <div class="card-body">
   <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr style="color: rgb(58, 18, 216); text-align: center;">
            <th>#</th>
            <th>المنتج</th>
            <th>الكمية</th>
            <th>السعر</th>
            <th>الأجمالي</th>
            <th>التاريخ</th>
            <th>ادارة</th>
         </tr>
        @foreach ($expenses as $expense)
          <tr style="color: rgb(31, 25, 37); text-align: center;">
                <td>{{ $expense->id }}</td>
                <td>{{ $expense->product}}</td>
                <td>{{ $expense->quantity}}</td>
                <td>{{ $expense->price }}</td>
                <td>{{ $expense->total }}</td>
                <td>{{ $expense->date }}</td>
                <td>
                 <a class="btn btn-sm btn-primary" href="{{ route('admin.expenses.edit',$expense->id) }}">
                    <i class="fas fa-edit"></i></a>
                 <form class="d-inline" action="{{ route('admin.expenses.destroy',$expense->id) }}" method="POST">
                     @csrf
                     @method('delete')
                     <button onclick="return confirm('هل انت متأكد من الحذف')" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                 </form>
                </td>
         </tr>
        @endforeach
    </table>
   </div>
  </div>
</div>
{{ $expenses->links() }}

@stop


