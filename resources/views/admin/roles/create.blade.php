
@extends('admin.master')
@section('title' , 'ادارة الصلاحيات')
@section('content')
@section('styles')

<style>
    ul{
        column-count: 4;
    }
</style>
@stop

<div>
  <h1  class="h3 mb-4 text-gray-800 " style="text-align: right;">اضافة صلاحيات</h1>
</div>

@include('admin.errors')

    <form action="{{ route('admin.roles.store') }}" method="POST">
       @csrf
        {{-- name --}}
        <div class="col" style="text-align: right">
            <div>
                <label style="color: black">اسم الصلاحية  :</label>
                <input type="text" name="name" placeholder="ادخل الاسم" class="form-control">
                <br>
            </div>
        </div>
       <label for=""> <input type="checkbox" id="check_all">الكل</label><br>
    <ul class="list-unstyled">
        @foreach ($apilities as $apility )
        <li><label ><input type="checkbox" name="apility[]" value="{{ $apility->id }}">  {{ $apility->name }}</label></li>
        @endforeach
    </ul>

        {{-- button --}}
        <div style="text-align: right">
          <button  class="btn btn-success w-25">اضافة</button>
        </div>

    </form>
@stop

@section('script')
    <script>
        $('#check_all').on('change',function(){
            $('input[type=checkbox]').prop('checked',$(this).prop('checked'));
        })
    </script>
@endsection


