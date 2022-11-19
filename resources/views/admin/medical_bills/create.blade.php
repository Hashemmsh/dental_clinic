
@extends('admin.master')

@section('title' , 'ادارة الكشفيات')

@section('content')

<div>
    <h1 style="text-align: right" class="h mb-4 text-gray-900">اضافة كشفية جديد</h1>
  <hr>
</div>

@include('admin.errors')

    <form action="{{ route('admin.medical_bills.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

            {{-- patient --}}
            <div class="col-md-6" style="text-align: right">
            <label for="inputName" class="control-label" style="color: black">المريض :</label>
            <select
            data-live-search="true"
            data-style="border-solid"
            id="patients"
            name="patient_id"
            class="form-control selectpicker input-lg dynamic">
            <option value="">اختر المريض</option>
            @foreach ($patients as $patient)
            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
            @endforeach
            </select>

            </div>
            <br>

            {{-- tooth --}}
            <div class="col-md-6" style="text-align: right">
            <label style="color: black">رقم السن :</label>
            <input
            min="1"
            type="number"
            name="tooth"
            placeholder="رقم السن"
            class="form-control"
            >
            <br>
            </div>

            {{-- service_id --}}
            <div class="col-md-6" id="di" style="text-align: right">
            <label for="inputName" style="color: black">اسم الخدمة :</label>
            <select
            data-live-search="true"
            data-style="border-solid"
            id="services"
            name="service_id"
            class="form-control selectpicker input-lg dynamic"
            >
            <option value="">--اختر الخدمة--</option>
            @foreach ($services as $service)
            <option value="{{ $service->id }}">
            {{ $service->service }}</option>
            @endforeach
            </select>

            </div>
            <br>

            {{-- prescription --}}
            <div class="col-md-6" style="text-align: right">
            <label style="color: black">روشيتة :</label>
            <span class="input-group-addon"></span>
            <textarea  name="prescription" class="form-control "
            placeholder="روشتة..." rows="5"
            class="form-control" ></textarea>
            <br>
            </div>

            {{-- Doctor --}}
            <div  class="col-md-6" style="text-align: right">
            <label class="form-label" style="color: black">الدكتور :</label>
            <select style="text-align: right" class="form-control  selectpicker input-lg dynamic"
            id="doctor" data-dependent="patients"
            name="doctor_id"
            data-live-search="true"
            data-style="border-solid"
            aria-label="Default select example"
            >
            <option value="" style="text-align: right">اختر الدكتور</option>
            @foreach($doctors as $doctor)
            {{-- @if($doctor->id!='Alldoctors') --}}
                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
            {{-- @endif --}}
            @endforeach
            </select>

            </div>

            <br>

            {{--Image  --}}
            <div class="col-md-6" style="text-align: right">
            <label  class="form-label mt-4" style="color: black">صورة بانوراما :</label>
            <input type="file"
            name="image"
            class="form-control"
            >
            <br>
            </div>
            {{-- image tow --}}
            {{--<div class="input-group control-group increment" >
            <input type="file" name="image[]" class="form-control">
            <div class="input-group-btn">
            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
            </div>
            </div>
            <div class="clone hide">
            <div class="control-group input-group" style="margin-top:10px">
            <input type="file" name="image[]" class="form-control">
            <div class="input-group-btn">
            <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
            </div>
            </div> --}}


            {{-- medicine --}}
            <div  class="col-md-6" style="text-align: right">
                <label style="color: black"> الدواء المستخدم لهذه الكشفية :</label>
                <select
                data-live-search="true"
                data-style="border-solid"
                id="medicines"
                name="medicine_id"
                class="form-control selectpicker input-lg dynamic">
                <option value="">--اختر الدواء--</option>
                @foreach ($medicines as $medicine)
                <option value="{{ $medicine->id }}">
                {{ $medicine->name }}</option>
                @endforeach
                </select>
            </div>
            <br>


            {{-- button --}}
            <div style="text-align: right">
            <button  class="btn btn-success w-25">اضافة</button>
            </div>

    </form>
    {{-- @section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="patient_id"]').on('change', function() {
                var patient_id = $(this).val();
                if(patient_id) {
                    $.ajax({
                        url: '/patientdoctor/ajax/'+patient_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {


                            $('select[name="doctor_id"]').empty();
                            $.each(data, function({{ $doctor->name }}, {{ $patient->name }}) {
                                $('select[name="doctor_id"]').append('<option value="'+ {{ $doctor->name }} +'">'+ {{ $patient->name }} +'</option>');
                            });

                        }
                    });
                }else{
                    $('select[name="dcotor_id"]').empty();
                }
            });
        });
    </script>
@stop --}}
<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){
          $(this).parents(".control-group").remove();
      });

    });

</script>

@stop

