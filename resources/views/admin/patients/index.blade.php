
@extends('admin.master')
@section('title' , 'ادارة المرضى')
@section('content')
@section('styles')

    <style>
        .table th,
        .table tr{
            vertical-align: middle;
        }
    </style>
@stop



        <!-- Topbar Search /print/pdf-->
    <div class="search-container" style="text-align: right">

        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
           action="{{ route('admin.patients.index') }}"
           method="GET"
           >
            <input  type="search" class="form-control small"
              value="{{ request()->search }}"
              placeholder="انقر للبحث..."
              name="search"
              aria-label="search about anything..."
              aria-describedby="search about anything..."
            >
            <button  class="btn btn-primary">
                <i class="fa fa-search "></i>
            </button>
        </form>
            {{-- Export PDF patient and print --}}
            <div class="" style="text-align: center">
                <a class="btn btn-primary  btn-sm ml-auto" href="{{ route('admin.patient.pdf') }}"><i class="fas fa-file-pdf"></i>PDF</a>
                <a href="{{ route('admin.patient.print') }}" class="btn btn-primary btn-sm ml-auto"><i class="fa fa-print"></i>Print</a>
            </div>
    </div>


    <hr>


 @if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
    {{ session('msg') }}
    </div>
 @endif
 <div class="card shadow mb-4">


    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="text-align: right">جميع المرضى</h6>
        <hr>
    </div>
 <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr style="color: rgb(58, 18, 216); text-align: center;">
            <th>معرف</th>
            <th>الأسم</th>
            <th>العمر</th>
            <th>الجنس</th>
            <th>الجوال</th>
            <th>العنوان</th>
            <th>الصورة</th>
            <th>الملاحظة</th>
            <th>الدكتور</th>
            <th>تاريخ الأنشاء</th>
            <th>ادارة</th>
        </tr>
        @foreach ($patients as $patient)
        <tr style="color: rgb(31, 25, 37); text-align: center;">
                <td>{{ $patient->id }}</td>
                <td>{{ $patient->name}}</td>
                <td>{{ $patient->age}}</td>
                <td>{{ $patient->gender }}</td>
                <td>{{ $patient->phone }}</td>
                <td>{{ $patient->address }}</td>
                <td><img width="70" src="{{ asset('uploads/patients/'.$patient->image)}}" alt=""></td>
                <td>{{ $patient->note }}</td>
                <td>{{ $patient->doctor->name }}</td>
                <td>{{ $patient->created_at }}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.patients.show' ,$patient->id) }}">
                    <i class="fa fa-eye" ></i></a>

                    <a class="btn btn-sm btn-primary" href="{{ route('admin.patients.edit',$patient->id) }}">
                    <i class="fas fa-edit" ></i></a>

                    <form class="d-inline" action="{{ route('admin.patients.destroy',$patient->id) }}" method="POST">
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
{{ $patients->links() }}
@stop





