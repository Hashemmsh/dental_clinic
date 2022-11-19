@extends('admin.master')

@section('title' , 'ادارة الحجوزات')

@section('content')



    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
        </div>
    @endif

    <!-- Topbar Search -->
    <div class="search-container" style="text-align: right">
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
            action="{{ route('admin.apponment.index') }}"
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


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="text-align: right">حجوزات المرضى</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead style="color: black">
                    <tr  style="color: rgb(58, 18, 216) ; text-align: center;">
                        <th>#</th>
                        <th>المريض</th>
                        <th>الدكتور</th>
                        <th>موعد</th>
                        <th>ملاحظات</th>
                        <th>حالة الحضور</th>
                        <th>وصول</th>
                        <th>انتظار</th>
                        <th>ادارة</th>
                    </tr>
                </thead>
     @foreach ($apponments as $apponment )
        <tbody>
            <tr style="color: rgb(31, 25, 37); text-align: center;">
                <td>{{ $apponment->id }}</td>
                <td>{{ $apponment->patient->name }}</td>
                <td>{{ $apponment->doctor->name }}</td>
                <td>{{ $apponment->date }}</td>
                <td>{{ $apponment->note }}</td>
                <td>{{$apponment->status}}</td>
                <td>
                    <a href="{{ route('admin.apponment.approved', $apponment->id) }}" class="btn btn-success ">وصول</a>
                </td>
                <td>
                    <a href="{{ route('admin.apponment.canceled', $apponment->id) }}" class="btn btn-danger ">الغاء</a>
                </td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.apponment.edit',$apponment->id) }}">
                        <i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.apponment.destroy',$apponment->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('هل انت متأكد من الحذف')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                </td>
            </tr>
        </tbody>
        @endforeach
            </table>
        </div>
    </div>
</div>

{{ $apponments->links() }}
@stop
