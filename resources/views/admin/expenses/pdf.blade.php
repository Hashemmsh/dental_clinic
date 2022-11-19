<@php
    require_once '/vendor/autoload.php';
@endphp
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
<body>

<h1>{{ __('All Doctor') }}</h1>

<table id="customers">
  <tr>
    <th>معرف</th>
    <th>الأسم</th>
    <th>الجنس</th>
    <th>العنوان</th>
    <th>الجوال</th>
    <th>البريد الاكترني</th>
  </tr>
  @foreach ($doctors as $doctor)
    <tr>
        <td>{{ $doctor->id }}</td>
        <td>{{ $doctor->name }}</td>
        <td>{{ $doctor->gender }}</td>
        <td>{{ $doctor->address }}</td>
        <td>{{ $doctor->phone }}</td>
        <td>{{ $doctor->email }}</td>
    </tr>
  @endforeach
</table>

</body>
</html>

