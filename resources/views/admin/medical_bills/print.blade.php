@extends('admin.print')
@section('styles')
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }
    </style>
@endsection
@section('title', 'معاينه طباعة الكشفية')
@section('content')
    <!-- row -->
    <div class="row row-sm" >
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header" style="text-align: right">
                            <h1 class="invoice-title">كشفية المريض</h1>
                            <div class="billed-from">
                                <h6>Dental Clinic/MySmile</h6>
                                <p><br>
                                    Tel No: +972 59 2121453<br>
                                    Email: nidal@gmail.com</p>
                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20" >


                            <div class="col-6">
                                <label class="tx-gray-200" style="color: rgb(3, 21, 181); font-size: 40px;  ">معلومات الكشفية  :</label>
                                <br>
                                <br>
                                <p class="invoice-info-row"><span style="color: black; font-size: 20px; " >اسم المريض :</span>
                                    <br>
                                    <span style="font-size: 25px">{{ $medical_bill->patient->name }}</span></p>

                                <p class="invoice-info-row"><span style="color: black; font-size: 20px;">الدواء :</span>
                                    <br>
                                    <span  style="font-size: 25px">{{ $medical_bill->medicine->name }}</span></p>
                                <p class="invoice-info-row"><span style="color: black; font-size: 20px;">روشيتة :</span>
                                    <br>
                                    <span  style="font-size: 25px">{{ $medical_bill->prescription}}</span></p>
                            </div>
                        </div>

                        <hr class="mg-b-40">

                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('scripts')
<script>
 window.print();
</script>
@stop
