@extends('admin.master')
@section('content')
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">قائمة الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل الفاتورة</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection



    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- row opened -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">معلومات
                                                    الفاتورة</a></li>
                                            <li><a href="#tab5" class="nav-link" data-toggle="tab">حالات الدفع</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">

                                        {{-- table/ معلمات الدفع --}}
                                        <div class="tab-pane active" id="tab4">
                                            <div class="table-responsive mt-15">
                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">رقم الفاتورة</th>
                                                            <td>{{ $invoices->invoice_number }}</td>
                                                            <th scope="row">تاريخ الاصدار</th>
                                                            <td>{{ $invoices->invoice_date }}</td>
                                                            <th scope="row">الخدمة</th>
                                                            <td>{{ $invoices->service->service }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">سعر الخدمة</th>
                                                            <td>{{ $invoices->service->price }}</td>

                                                            <th scope="row">الخصم</th>
                                                            <td>{{ $invoices->discount}}</td>

                                                            <th scope="row">المعمل</th>
                                                            <td>{{ $invoices->laboratories }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">الحالة الحالية</th>

                                                            @if ($invoices->value_status == 1)
                                                                <td><span
                                                                        class="badge badge-pill badge-success">{{ $invoices->status }}</span>
                                                                </td>
                                                            @elseif($invoices->value_status ==2)
                                                                <td><span
                                                                        class="badge badge-pill badge-danger">{{ $invoices->status }}</span>
                                                                </td>
                                                            @else
                                                                <td><span
                                                                        class="badge badge-pill badge-warning">{{ $invoices->status }}</span>
                                                                </td>
                                                            @endif
                                                            <th scope="row" >الأجمالي</th>
                                                            <td>{{ $invoices->total }}</td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab5">
                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0 table-hover"
                                                    style="text-align:center">
                                                    <thead>
                                                        <tr class="text-dark">
                                                            <th>#</th>
                                                            <th>رقم الفاتورة</th>
                                                            <th>نوع الخدمة</th>
                                                            <th>حالة الدفع</th>
                                                            <th>المدفوع</th>
                                                            <th>المتبقي</th>
                                                            <th>تاريخ الدفع </th>
                                                            <th>تاريخ الأضافة</th>
                                                            <th>المستخدم</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($details as $x)
                                                            <tr>
                                                                <td>{{ $x->id }}</td>
                                                                <td>{{ $x->invoice_number }}</td>
                                                                <td>{{ $invoices->service->service }}</td>
                                                                @if ($x->value_status == 1)
                                                                    <td><span
                                                                            class="badge badge-pill badge-success">{{ $x->status }}</span>
                                                                    </td>
                                                                @elseif($x->value_status ==2)
                                                                    <td><span
                                                                            class="badge badge-pill badge-danger">{{ $x->status }}</span>
                                                                    </td>
                                                                @else
                                                                    <td><span
                                                                            class="badge badge-pill badge-warning">{{ $x->status }}</span>
                                                                    </td>
                                                                @endif
                                                                <td>{{ $invoices->paid }}</td>
                                                                <td>{{ $invoices->remaining }}</td>
                                                                <td>{{ $x->payment_date }}</td>
                                                                <td>{{ $x->created_at }}</td>
                                                                <td>{{ $x->user->name }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

@stop
