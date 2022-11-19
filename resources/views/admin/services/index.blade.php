
@extends('admin.master')
@section('title' , 'ادارة الخدمات')
@section('content')

    @if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
    {{ session('msg') }}
    </div>
    @endif

<div class="card shadow mb-4">

        <div class="card-header py-3"  style="text-align: right">
           <h6 class="m-0 font-weight-bold text-primary">{{ __('All Service') }}</h6>
        </div>


  <div class="card-body">
   <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <tr style="color: rgb(58, 18, 216); text-align: center;">
                        <th>المعرف</th>
                        <th>الخدمة</th>
                        <th>تفاصيل الخدمة</th>
                        <th>السعر</th>
                        <th>ادارة</th>
                    </tr>

          @foreach ($services as $service)

                    <tr style="color: rgb(31, 25, 37); text-align: center;">
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->service}}</td>
                        <td>{{ $service->description }}</td>
                        <td>{{ $service->price }}</td>
                        <td>
                         <a class="btn btn-sm btn-primary" href="{{ route('admin.services.edit',$service->id) }}">
                            <i class="fas fa-edit"></i></a>
                         <form class="d-inline" action="{{ route('admin.services.destroy',$service->id) }}" method="POST">
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

{{ $services->links() }}
@stop


