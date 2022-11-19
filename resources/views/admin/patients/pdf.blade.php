<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    {{-- <meta charset="utf-8"> --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> PDF تصدير </title>

</head>
<body style="font-family: 'dejavu sans';direction: rtl">

<h1>المرضى</h1>

<table id="customers" border="1" style="border-collapse: collapse; width:100%">
  <tr>
    <th>الدكتور</th>
    <th>الملاحظة</th>
    <th>العنوان</th>
    <th>الجوال</th>
    <th>الجنس</th>
    <th>العمر</th>
    <th>الأسم</th>
    <th>معرف</th>
  </tr>
  @foreach ($patients as $patient)
    <tr>
        <td>{{ $patient->doctor->name }}</td>
        <td>{{ $patient->note }}</td>
        <td>{{ $patient->address }}</td>
        <td>{{ $patient->phone }}</td>
        <td>{{ $patient->gender }}</td>
        <td>{{ $patient->age }}</td>
        <td>{{ $patient->name }}</td>
        <td>{{ $patient->id }}</td>
    </tr>
  @endforeach
</table>

</body>
</html>

