
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
  <h1  class="h3 mb-4 text-gray-800" style="text-align: right;">تعديل  الصلاحية</h1>
</div>

@include('admin.errors')

<form action="{{ route('admin.roles.update',$role->id) }}" method="POST">
    @csrf
    @method('put')

    {{-- name --}}
    <div class="col" style="text-align: right">
            <div>
                <label style="color: black">اسم الصلاحية :</label>
                <input type="text" name="name" placeholder="ادخل الاسم" class="form-control" value="{{ $role->name }}">

            </div>
    </div>
    <br>
    <label for=""> <input type="checkbox" id="check_all">الكل</label><br>

    <ul class="list-unstyled">
        @foreach ($apilities as $apility )
        <li><label ><input {{ $role->apilities->find($apility->id) ? 'checked' : ''}} type="checkbox" name="apility[]" value="{{ $apility->id }}">  {{ $apility->name }}</label></li>
        @endforeach
    </ul>
    <br>
    {{-- button --}}
    <div style="text-align: right">
        <button  class="btn btn-success w-25">تعديل</button>
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

