
@extends('admin.print')
@section('title' , 'ادارة الموظفين')
@section('content')
@section('styles')
    <style>
        .table th,
        .table tr{
            vertical-align: middle;
        }
    </style>
@stop



 @if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
    {{ session('msg') }}
    </div>
 @endif
 <div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="text-align: right">{{ __('All Doctor') }}</h6>
        <hr>
    </div>
 <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr style="color: rgb(58, 18, 216)">
            <th>الأسم</th>
            <th>الجنس</th>
            <th>العنوان</th>
            <th>الجوال</th>
        </tr>
        @foreach ($doctors as $doctor)
        <tr style="color: rgb(31, 25, 37)">
                <td>{{ $doctor->name}}</td>
                <td>{{ $doctor->gender }}</td>
                <td>{{ $doctor->address }}</td>
                <td>{{ $doctor->phone }}</td>
        </tr>
        @endforeach
     </table>
    </div>
 </div>
</div>
@section('scripts')
    <script>
        window.print();
    </script>
@endsection
@stop





