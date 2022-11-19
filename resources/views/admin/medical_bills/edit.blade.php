
 @extends('admin.master')

 @section('title' , 'ادارة الكشفيات')

 @section('content')



 <h1 class="h3 mb-4 text-gray-800" style="text-align: right">تعديل كشفية المريض</h1>

  @include('admin.errors')

    <form action="{{ route('admin.medical_bills.update',$medical_bill->id) }}" method="POST">
           @csrf
          @method('put')

         {{-- patient --}}
        <div class="col-md-6" style="text-align: right">
            <label style="color: black">المريض :</label>
            <select id="patient" name="patient_id" class="form-control">
             <option value="">اختر المريض...</option>
             @foreach ($patients as $patient)
             <option {{ $medical_bill->patient_id  == $patient->id? 'selected' : '' }} value="{{ $patient->id }}">{{ $patient->name }}</option>
             @endforeach
           </select>
           <br>
        </div>
                {{-- tooth --}}
        <div class="col-md-6" style="text-align: right">
                    <label style="color: black">رقم السن :</label>
                    <input
                       value="{{ $medical_bill->tooth }}"
                        min="1"
                        type="number"
                        name="tooth"
                        placeholder="رقم السن"
                        class="form-control"
                        >
                        <br>
        </div>

            {{-- service_id--}}
        <div class="col-md-6" id="di" style="text-align: right">
            <label style="color: black">اسم الخدمة :</label>
            <select name="service_id" class="form-control">
                <option value="">--اختر الخدمة--</option>
                @foreach ($services as $service)
                <option  {{ $medical_bill->service_id  == $service->id? 'selected' : '' }} value="{{ $service->id }}">{{ $service->service }}</option>
                @endforeach
            </select>
           <br>
        </div>

        {{-- prescription --}}
        <div class="form-group" style="text-align: right">
            <label class="col-md-6 control-label" style="color: black" >روشيتة  :</label>
                <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    @isset($medical_bill)
                    <textarea placeholder="ملاحظة"  class="form-control" name="prescription"
                     required>{{$medical_bill->prescription}}</textarea>
                   @else
                   <textarea  class="input-group-addon" name="prescription"  required></textarea>
                   @endIf
            </div>
            </div>
            <br>
        </div>

        {{-- doctor --}}
        <div  class="col-md-6 " style="text-align: right">
            <label style="color: black">اسم الدكتور :</label>
            <select name="doctor_id" class="form-control">
                <option value="">{{$medical_bill->doctor->name}}</option>
                @foreach ($doctors as $doctor)
                <option {{ $medical_bill->doctor_id == $doctor->id ? 'selected' : '' }} value="{{ $doctor->id }}">{{ $doctor->name }}</option>
               @endforeach
            </select>
            <br>

        </div>

        {{-- image --}}
        <div  class="col-md-6" style="text-align: right">
            <label style="color: black">صورة بانوراما :</label>
            <input value="{{ $medical_bill->image }}" type="file" name="image"
             class="form-control">
             <td><img width="80" src="{{ asset('uploads/medical_bills/'.$medical_bill->image) }}"  alt=""></td>
            <br>

        </div>

        {{-- medicine --}}
        <div  class="col-md-6" style="text-align: right">
            <label style="color: black"> الدواء المستخدم لهذه الكشفية :</label>
            <select name="medicine_id" class="form-control">
                <option value="">..الدواء..</option>
                @foreach ($medicines as $medicine)
                <option {{ $medical_bill->medicine_id == $medicine->id ? 'selected' : '' }} value="{{ $medicine->id }}">{{ $medicine->name }}</option>
               @endforeach
            </select>
            <br>
        </div>

        {{-- button --}}
        <div style="text-align: right">
          <button  class="btn btn-success w-25">تعديل</button>
        </div>

    </form>

@stop


