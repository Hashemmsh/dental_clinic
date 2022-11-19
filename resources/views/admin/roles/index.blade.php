
@extends('admin.master')
@section('title' , 'ادارة الصلاحيات')
@section('content')

    @if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
    {{ session('msg') }}
    </div>
    @endif

<div class="card shadow mb-4">
    <div class="d-flex justify-content-between align-items-center mb-4"  style="text-align: right ; margin: 5px;">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Role') }}</h6>
        <a class="btn btn-success" href="{{ route('admin.roles.create') }}"> اضافة</a>
    </div>
        {{-- <div class="card-header py-3"  style="text-align: right">
           <h6 class="m-0 font-weight-bold text-primary">{{ __('Role') }}</h6>
           <a class="btn btn-success" href="{{ route('admin.roles.create') }}"> اضافة</a>
        </div> --}}


  <div class="card-body">
   <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr style="color: rgb(58, 18, 216)">
            <th>المعرف</th>
            <th>الأسم</th>
            <th>الأدارة</th>
         </tr>
        @foreach ($roles as $role)
          <tr style="color: rgb(31, 25, 37)">
                <td>{{ $role->id }}</td>
                <td>{{ $role->name}}</td>

                <td>
                 <a class="btn btn-sm btn-primary" href="{{ route('admin.roles.edit',$role->id) }}">
                    <i class="fas fa-edit"></i></a>
                 <form class="d-inline" action="{{ route('admin.roles.destroy',$role->id) }}" method="POST">
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
{{ $roles->links() }}

@stop


