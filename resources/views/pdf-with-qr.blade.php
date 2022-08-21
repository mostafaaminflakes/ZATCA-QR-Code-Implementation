<!DOCTYPE html>

<html>

<head>
    <title>pdf test</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

    <h1>this is {{ $company_name }} with id {{$id}}</h1>

    <p>{!! $par_code!!}</p>
    <p>{{ $invoice_date }}</p>
    <p>{{$total_amount}}</p>
    <p>yes It worked</p>
</body>
<script>
    $(window).ready(function () {
    window.print();
    })
</script>

</html>