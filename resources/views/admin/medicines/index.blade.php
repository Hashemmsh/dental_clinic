
@extends('admin.master')
@section('title' , 'ادارة الأدوية')
@section('content')


        <!-- Topbar Search -->
    <div class="search-container " style="text-align: right" >
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
            action="{{ route('admin.medicines.index') }}"
            method="GET"
            >
                <input  type="search" class="form-control small"
                value="{{ request()->search }}"
                placeholder="انقر للبحث..."
                name="search"
                aria-label="search about anything..."
                aria-describedby="search about anything..."
                >
                <button class="btn btn-primary">
                    <i class="fa fa-search "></i>
                </button>
        </form>

    </div>
    <hr>


@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
    {{ session('msg') }}
    </div>
@endif



<div class="card shadow mb-4">
        <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary" style="text-align: right; ">جميع الأدوية </h6>
        </div>


  <div class="card-body">
   <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

          <tr style="color: black ; text-align: center;">
            <th>#</th>
            <th>الأسم</th>
            <th>دواعي الاستعمال</th>
            <th>الأعراض</th>
            <th>ملاحظات</th>
            <th>المضيف</th>
            <th>ادارة</th>
         </tr>

        @foreach ($medicines as $medicine)
            <tr style="text-align: text-align: center;">
                <td>{{ $medicine->id }}</td>
                <td>{{ $medicine->name}}</td>
                <td>{{ $medicine->indictions}}</td>
                <td>{{ $medicine->symptoms }}</td>
                <td>{{ $medicine->details }}</td>
                <td>{{ $medicine->doctor->name }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.medicines.edit',$medicine->id) }}">
                    <i class="fas fa-edit"></i></a>
                    <form class="d-inline" action="{{ route('admin.medicines.destroy',$medicine->id) }}" method="POST">
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
{{ $medicines->links() }}

@stop


