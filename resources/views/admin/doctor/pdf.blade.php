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

<h1>{{ __('All Doctor') }}</h1>

<table id="customers" border="1" style="border-collapse: collapse; width:100%">
  <tr>
    <th>البريد الألكتروني</th>
    <th>الجوال</th>
    <th>العنوان</th>
    <th>الجنس</th>
    <th>الأسم</th>
    <th>#</th>
  </tr>
  @foreach ($doctors as $doctor)
    <tr>
        <td>{{ $doctor->email }}</td>
        <td>{{ $doctor->phone }}</td>
        <td>{{ $doctor->address }}</td>
        <td>{{ $doctor->gender }}</td>
        <td>{{ $doctor->name }}</td>
        <td>{{ $doctor->id }}</td>
    <tr>
  @endforeach
</table>

</body>
</html>

