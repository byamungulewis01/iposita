{{--{{dd($top_ups->get())}}--}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1 style="text-align: center">{{$title}}</h1>
<table>
    <thead>
    <tr>
            <th>Service Provider</th>
            <th>Service</th>
            <th>Previous amount</th>
            <th>Top-up Amount</th>
            <th>Current Amount</th>
            <th>comment</th>
            <th>Status</th>
            <th>Created At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($top_ups as $top_up)
        <tr>
            <td>{{optional($top_up->serviceProvider)->name??'-'}}</td>
            <td>{{optional($top_up->service)->name??'-'}}</td>
            <td style="text-align: center">{{number_format($top_up->previous_amount)}}</td>
            <td style="text-align: center">{{number_format($top_up->topup_amount)}}</td>
            <td style="text-align: center">{{number_format($top_up->current_amount)}}</td>
            <td>{{$top_up->description ?? '-'}}</td>
            <td>{{strtoupper($top_up->status)}}</td>
            <td>{{optional($top_up->created_at)->format('Y-m-d h:m:s')}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
