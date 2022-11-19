<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    {{-- <meta charset="utf-8"> --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> PDF </title>

</head>
<body style="font-family: 'dejavu sans';direction: rtl">

<h1>جميع الفواتير الخارجية</h1>

<table id="customers" border="1" style="border-collapse: collapse; width:100%">
  <tr>
    <th>المتبقي</th>
    <th>المدفوع</th>
    <th>الأجمالي</th>
    <th>الخصم</th>
    <th>المعمل</th>
    <th>سعر الخدمة</th>
    <th>الخدمة</th>
    <th>اسم المريض</th>
    <th>تاريخ الفاترورة</th>
    <th>رقم الفاتورة</th>
    <th>#</th>
  </tr>
  @foreach ($invoices as $invoice)
    <tr>
        <td>{{ $invoice->remaining }}</td>
        <td>{{ $invoice->paid }}</td>
        <td>{{ $invoice->total }}</td>
        <td>{{ $invoice->discount }}</td>
        <td>{{ $invoice->laboratories }}</td>
        <td>{{ $invoice->service->price }}</td>
        <td>{{ $invoice->service->service }}</td>
        <td>{{ $invoice->patient->name }}</td>
        <td>{{ $invoice->invoice_date }}</td>
        <td>{{ $invoice->invoice_number }}</td>
        <td>{{ $invoice->id }}</td>
    </tr>
  @endforeach
</table>

</body>
</html>

