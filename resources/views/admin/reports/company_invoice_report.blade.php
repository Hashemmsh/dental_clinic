@extends('admin.master')
@section('content')
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div  style="text-align: center">
            <a class="btn btn-primary  btn-sm ml-auto" href="{{ route('company_invoice_report') }}"><i class="fas fa-file-pdf"></i>PDF</a>
        </div>
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">التقارير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تقرير
             الفواتير الخارجية</span>
                         {{-- Export PDF patient and print --}}

        </div>
    </div>
</div>
<!-- breadcrumb -->

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>خطا</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- row -->
<div class="row">

    <div class="col-xl-12">
        <div class="card mg-b-20">


            <div class="card-header pb-0">

                <form action="{{ route('search_company_invoice') }}" method="POST" role="search" autocomplete="off">
                    @csrf


                    <div class="col-lg-3">
                        <label class="rdiobox">
                            <input checked name="rdio" type="radio" value="1" id="type_div"> <span>بحث بنوع
                                الفاتورة</span></label>
                    </div>


                    <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                        <label class="rdiobox"><input name="rdio" value="2" type="radio"><span>بحث برقم الفاتورة
                            </span></label>
                    </div><br><br>

                    <div class="row">

                        <div class="col-lg-3 mg-t-20 mg-lg-t-0" id="type">
                            <p class="mg-b-10">تحديد نوع الفواتير</p><select class="form-control select2" name="type"
                                required>
                                <option value="{{ $type ?? 'حدد نوع الفواتير' }}" selected>
                                    {{ $type ?? 'حدد نوع الفواتير' }}
                                </option>

                                <option value="مدفوعة">الفواتير المدفوعة</option>
                                <option value="غير مدفوعة">الفواتير الغير مدفوعة</option>
                                <option value="مدفوعة جزئيا">الفواتير المدفوعة جزئيا</option>

                            </select>
                        </div><!-- col-4 -->


                        <div class="col-lg-3 mg-t-20 mg-lg-t-0" id="invoice_number">
                            <p class="mg-b-10">البحث برقم الفاتورة</p>
                            <input type="text" class="form-control" id="invoice_number" name="invoice_number">

                        </div><!-- col-4 -->

                        <div class="col-lg-3" id="start_at">
                            <label for="exampleFormControlSelect1">من تاريخ</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                </div><input class="form-control fc-datepicker" value="{{ $start_at ?? '' }}"
                                    name="start_at" placeholder="YYYY-MM-DD" type="text">
                            </div><!-- input-group -->
                        </div>

                        <div class="col-lg-3" id="end_at">
                            <label for="exampleFormControlSelect1">الي تاريخ</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                </div><input class="form-control fc-datepicker" name="end_at"
                                    value="{{ $end_at ?? '' }}" placeholder="YYYY-MM-DD" type="text">
                            </div><!-- input-group -->
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-sm-1 col-md-1">
                            <button class="btn btn-primary btn-block">بحث</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (isset($details))
                        <table id="example" class="table key-buttons text-md-nowrap" style=" text-align: center">
                            <thead>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">رقم الفاتورة</th>
                                    <th class="border-bottom-0">اسم الشركة</th>
                                    <th class="border-bottom-0">المنتج</th>
                                    <th class="border-bottom-0">الكمية</th>
                                    <th class="border-bottom-0">السعر</th>
                                    <th class="border-bottom-0">الأجمالي</th>
                                    <th class="border-bottom-0">المدفوع</th>
                                    <th class="border-bottom-0">المتبقي</th>
                                    <th class="border-bottom-0">الحالة</th>
                                    <th class="border-bottom-0">التاريخ</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $company_invoice)

                                    <tr>
                                        <td>{{ $company_invoice->id }}</td>
                                        <td>{{ $company_invoice->invoice_number }} </td>
                                        <td>{{ $company_invoice->company_name}} </td>
                                        <td><a
                                            href="{{ url('Company_invoice_details') }}/{{ $company_invoice->id }}">   {{ $company_invoice->product }}</a>
                                    </td>
                                        <td>{{ $company_invoice->quantity }}</td>

                                        <td>{{ $company_invoice->price }}</td>
                                        <td>{{ $company_invoice->total }}</td>
                                        <td>{{ $company_invoice->paid }}</td>
                                        <td>{{ $company_invoice->remaining }}</td>
                                        <td>
                                            @if ($company_invoice->value_status == 1)
                                                <span class="text-success">{{ $company_invoice->status }}</span>
                                            @elseif($company_invoice->value_status == 2)
                                                <span class="text-danger">{{ $company_invoice->status }}</span>
                                            @else
                                                <span class="text-warning">{{ $company_invoice->status }}</span>
                                            @endif

                                        </td>
                                        <td>{{ $company_invoice->date}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            @endif
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('script')

<script>
    var date = $('.fc-datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    }).val();
</script>

<script>
    $(document).ready(function() {
        $('#invoice_number').hide();
        $('input[type="radio"]').click(function() {
            if ($(this).attr('id') == 'type_div') {
                $('#invoice_number').hide();
                $('#type').show();
                $('#start_at').show();
                $('#end_at').show();
            } else {
                $('#invoice_number').show();
                $('#type').hide();
                $('#start_at').hide();
                $('#end_at').hide();
            }
        });
    });
</script>
@endsection



