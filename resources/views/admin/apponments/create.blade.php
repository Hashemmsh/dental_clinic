
 @extends('admin.master')
 @section('title' , 'ادارة الحجوزات')
 @section('content')




  <h1  class="h3 mb-4 text-gray-800 " style="text-align: right;">{{ __('Add Apponment') }}</h1>
  @include('admin.errors')
     <form action="{{ route('admin.apponment.store') }}" method="POST">
        @csrf


            {{-- Doctor --}}
            <div  class="col-md-6" style="text-align: right">
                     <label class="form-label" style="color: black">الدكتور :</label>
                    <select style="text-align: right" class="form-control  selectpicker input-lg dynamic"
                            id="doctor" data-dependent="patients"
                            name="doctor_id"
                            data-live-search="true"
                            data-style="border-solid"
                            aria-label="Default select example"
                            required>
                        <option value="" style="text-align: right">اختر الدكتور</option>
                         @foreach($doctors as $doctor)
                            {{-- @if($doctor->id!='Alldoctors') --}}
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                         {{-- @endif --}}
                         @endforeach
                    </select>

            </div>

<br>
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
            {{-- date --}}
            <div class="col-md-6" style="text-align: right; ">
             <label style="color: black">موعد :</label>
             <input class=" col-md-6" id="party" type="datetime-local" name="date" value=""/>
            </div>
<br>
            {{-- note --}}
            <div class="col-md-6" style="text-align: right">
                <label class="control-label" style="color: black" >ملاحظة السكرتير/ة :</label>
                <div >
               <div class="input-group">
               <span class="input-group-addon "><i class="glyphicon glyphicon-pencil"></i></span>
                <textarea class="form-control border-solid" name="note" placeholder="ملاحظة"></textarea>
               </div>
               </div>

            </div>

<br>
            {{-- button --}}
            <div  class="col-md-6" style="text-align: right">
             <button   class="btn btn-success w-25 border-solid">اضافة</button>
            </div>

    </form>


    @stop













		{{-- <script>
            //Ajax code

			$(document).ready(function () {
				$('.dynamic').change(function () {
					if ($(this).val() != '') {
						var select = $(this).attr("id");
						var value = $(this).val();
						var dependent = $(this).data('dependent');
						var _token = $('input[name="_token"]').val();
						$.ajax({
							url: "{{ route('admin.dynamicdependent.fetch') }}",
							method: "POST",
							data: {
								select: select,
								value: value,
								_token: _token,
								dependent: dependent
							},
							success: function (result) {
								$('#' + dependent).html(result);
								$('#' + dependent).selectpicker('refresh');
							}
						})
					}
				});
				$('#doctor').change(function () {
					$('#patients').val('');
				});
			});
		</script> --}}
       {{-- @stop --}}

{{--
<script>
    $(document).redy(function(){

        $('.dynamic').change(function(){

            if($(this).val() != ''){

                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var_token = $('input[name="_token"]').val();
                $.ajax({
                    url : "{{ route('admin.dynamic_dependent') }}",
                    method: "GET",
                    data:{select:select ,value:value, _token:_token , dependent:dependent},
                    success:function(result){
                        $('#'+dependent).html(result);
                    }
                })
        })
    });

</script> --}}



{{--
     <script type="text/javascript"
            $(document).ready(function() {
        $('select[name="doctor"]').on('change', function() {
            var doctorId = $(this).val();
            if (doctorId ) {
                $.ajax({
                    url: "{{ URL::to('doctor') }}/" + doctorId ,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="patient"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="patient"]').append('<option value="' +
                                value + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
      });
</script>
--}}

