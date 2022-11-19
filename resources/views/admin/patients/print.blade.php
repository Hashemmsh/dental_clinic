
@extends('admin.print')
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
        <tr style="color: rgb(58, 18, 216)">
            <th>الأسم</th>
            <th>العمر</th>
            <th>الجنس</th>
            <th>الجوال</th>
            <th>العنوان</th>
            <th>الملاحظة</th>
            <th>الدكتور</th>
        </tr>
        @foreach ($patients as $patient)
        <tr style="color: rgb(31, 25, 37)">
                <td>{{ $patient->name}}</td>
                <td>{{ $patient->age}}</td>
                <td>{{ $patient->gender }}</td>
                <td>{{ $patient->phone }}</td>
                <td>{{ $patient->address }}</td>
                <td>{{ $patient->note }}</td>
                <td>{{ $patient->doctor->name }}</td>
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





