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
    <th>التاريخ</th>
    <th>المتبقي</th>
    <th>المدفوع</th>
    <th>الأجمالي</th>
    <th>السعر</th>
    <th>الكمية</th>
    <th>المنتج</th>
    <th>اسم الشركة</th>
    <th>رقم الفاتورة</th>
    <th>#</th>
  </tr>
  @foreach ($company_invoices as $company_invoice)
    <tr>
        <td>{{ $company_invoice->date }}</td>
        <td>{{ $company_invoice->remaining }}</td>
        <td>{{ $company_invoice->paid }}</td>
        <td>{{ $company_invoice->total }}</td>
        <td>{{ $company_invoice->price }}</td>
        <td>{{ $company_invoice->quantity }}</td>
        <td>{{ $company_invoice->product }}</td>
        <td>{{ $company_invoice->company_name }}</td>
        <td>{{ $company_invoice->invoice_number }}</td>
        <td>{{ $company_invoice->id }}</td>
    </tr>
  @endforeach
</table>

</body>
</html>

