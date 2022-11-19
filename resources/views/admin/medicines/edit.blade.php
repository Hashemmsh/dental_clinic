
 @extends('admin.master')
 @section('title' , 'ادارة الأدوية')
 @section('content')

  <h1  class="h3 mb-4 text-gray-800 " style="text-align: right;">تعديل الدواء</h1>
  
  @include('admin.errors')
<form action="{{ route('admin.medicines.update',$medicine->id) }}" method="POST">
        @csrf
        @method('put')
        {{-- name --}}
        <div class="col-md-6" style="text-align: right">
            <div>
                <label style="color: black">اسم الدواء :</label>
                <input type="text" name="name" placeholder="ادخل الاسم" class="form-control" value="{{ $medicine->name }}">
                <hr class="sidebar-divider mb-3">

            </div>
        </div>

        {{-- indictions --}}
        <div class="form-group" style="text-align: right">
            <label class="col-md-6 control-label" style="color: black" > دواعي الأستعمال:</label>
                <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    @isset($medicine)
                    <textarea placeholder="دواعي الأستعمال"  class="form-control" name="indictions"
                     required>{{$medicine->indictions}}</textarea>
                   @else
                   <textarea  class="input-group-addon" name="indictions"  required></textarea>
                   @endIf
            </div>
            </div>
            <hr class="sidebar-divider mb-3">
        </div>

           {{-- symptoms --}}
        <div class="form-group" style="text-align: right">
            <label class="col-md-6 control-label" style="color: black" >   الأعراض :</label>
                <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    @isset($medicine)
                    <textarea placeholder="الأعراض"  class="form-control" name="symptoms"
                     required>{{$medicine->symptoms}}</textarea>
                   @else
                   <textarea  class="input-group-addon" name="symptoms"  required></textarea>
                   @endIf
            </div>
            </div>
            <hr class="sidebar-divider mb-3">
        </div>


        {{-- details --}}
        <div class="form-group" style="text-align: right">
            <label class="col-md-6 control-label" style="color: black" >  تفاصيل اضافية :</label>
                <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    @isset($medicine)
                    <textarea placeholder="تفاصيل اضافية"  class="form-control" name="details"
                     required>{{$medicine->details}}</textarea>
                   @else
                   <textarea  class="input-group-addon" name="details"  required></textarea>
                   @endIf
            </div>
            </div>
            <hr class="sidebar-divider mb-3">
        </div>


             {{-- Doctor --}}
        <div  class="col-md-6" style="text-align: right">
             <label style="color: black">دكتور المضيف :</label>
             <select name="doctor_id" class="form-control">
                <option value="">--اختر المضيف--</option>
                @foreach ($doctors as $doctor)
                <option  {{ $medicine->doctor_id == $doctor->id ? 'selected' : "" }} value="{{$doctor->id }}">
                   {{ $doctor->name }}</option>
                @endforeach
            </select>
            <hr class="sidebar-divider mb-3">
        </div>

            {{-- button --}}
        <div style="text-align: right">
          <button  class="btn btn-success w-25">اضافة</button>
        </div>

</form>
@stop


