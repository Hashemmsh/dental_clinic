
@extends('admin.master')
@section('title' , 'ادارة الموظفين')
@section('content')

    @if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
    {{ session('msg') }}
    </div>
    @endif

<div class="card shadow mb-4">
        <div class="card-header py-3"  style="text-align: right">
           <h6 class="m-0 font-weight-bold text-primary">{{ __('All Doctor') }}</h6>
           <div class="" style="text-align: center">
            <a class="btn btn-primary  btn-sm ml-auto" href="{{ route('admin.doctors.pdf') }}"><i class="fas fa-file-pdf"></i>PDF</a>
            <a href="{{ route('admin.doctors.print') }}" class="btn btn-primary btn-sm ml-auto"><i class="fa fa-print"></i>Print</a>
        </div>
        </div>


  <div class="card-body">
   <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr style="color: rgb(58, 18, 216) ; text-align: center;" >
            <th>المعرف</th>
            <th>الأسم</th>
            <th>الجنس</th>
            <th>العنوان</th>
            <th>الجوال</th>
            <th>البريد الالكتروني</th>
            <th>ادارة</th>
         </tr>
        @foreach ($doctors as $doctor)
          <tr style="color: rgb(31, 25, 37); text-align: center;">
                <td>{{ $doctor->id }}</td>
                <td>{{ $doctor->name}}</td>
                <td>{{ $doctor->gender}}</td>
                <td>{{ $doctor->address }}</td>
                <td>{{ $doctor->phone }}</td>
                <td>{{ $doctor->email }}</td>
                <td>
                 <a class="btn btn-sm btn-info" href="{{ route('admin.doctors.show' ,$doctor->id) }}">
                    <i class="fa fa-eye" ></i></a>
                 <a class="btn btn-sm btn-primary" href="{{ route('admin.doctors.edit',$doctor->id) }}">
                    <i class="fas fa-edit"></i></a>
                 <form class="d-inline" action="{{ route('admin.doctors.destroy',$doctor->id) }}" method="POST">
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
{{ $doctors->links() }}

@stop


