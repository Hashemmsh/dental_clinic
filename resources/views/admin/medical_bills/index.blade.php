
@extends('admin.master')
@section('title' , 'ادارة الكشفيات')
@section('content')
@section('styles')
    <style>
        .table th,
        .table tr{
            vertical-align: middle;
        }
    </style>
@stop

        <!-- Topbar Search -->
    <div class="search-container" style="text-align: right">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
        action="{{ route('admin.medical_bills.index') }}"
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
        <h6 class="m-0 font-weight-bold text-primary" style="text-align: right">الكشفيات</h6>
    </div>




 <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr style="color: rgb(58, 18, 216); text-align: center;">
            <th>#</th>
            <th>المريض</th>
            <th>رقم السن</th>
            <th>اسم الخدمة</th>
            <th>الروشيتة</th>
            <th>دكتور الحالة</th>
            <th>صور بانوراما</th>
            <th>الدواء</th>
            <th>ادارة</th>
        </tr>

        @foreach ($medical_bills as $medical_bill)
        <tr style="color: rgb(31, 25, 37) ; text-align: center;">
                <td>{{ $medical_bill->id }}</td>
                <td>{{ $medical_bill->patient->name}}</td>
                <td>{{ $medical_bill->tooth}}</td>
                <td>{{ $medical_bill->service->service}}</td>
                <td>{{ $medical_bill->prescription }}</td>
                <td>{{ $medical_bill->doctor->name }}</td>
                <td><img width="70" src="{{ asset('uploads/medical_bills/'.$medical_bill->image)}}" alt=""></td>
                <td>{{ $medical_bill->medicine->name }}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.medical_bills.show',$medical_bill->id) }}">
                    <i class="fa fa-eye" ></i></a>

                    <a class="btn btn-sm btn-primary" href="{{ route('admin.medical_bills.edit',$medical_bill->id) }}">
                    <i class="fas fa-edit" ></i></a>

                    <form class="d-inline" action="{{ route('admin.medical_bills.destroy',$medical_bill->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('هل انت متأكد من الحذف')" class="btn btn-sm btn-danger"><i  class="fas fa-trash"></i></button>
                    </form>
                </td>
        </tr>
        @endforeach
     </table>
    </div>
 </div>
</div>
   {{ $medical_bills->links() }}
@stop





