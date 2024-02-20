<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 10px;
            color: #555;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 2px 5px;
        }
    </style>
</head>
<body>
<h1 style="text-align: center">{{$title}}</h1>
<table>
    <thead>
    <tr>
            <th>Branch Name</th>
            <th>Customer Name</th>
            <th>Customer Telephone</th>
            <th>Service Provider</th>
            <th>Service</th>
            <th>Reference Number</th>
            <th>Amount</th>
            <th>Charge type</th>
            <th>Total Charges</th>
            <th>Created At</th>
            <th>Status</th>
            <th>Done By</th>
    </tr>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
        <tr>
            <td>{{optional($transaction->branch)->name??'-'}}</td>
            <td>{{$transaction->customer_name}}</td>
            <td>{{$transaction->customer_phone}}</td>
            <td>{{optional($transaction->serviceCharges)->serviceProvider->name??'-'}}</td>
            <td>{{optional($transaction->serviceCharges)->service->name??'-'}}</td>
            <td>{{$transaction->reference_number}}</td>
            <td>{{number_format($transaction->amount)}}</td>
            <td>{{$transaction->charges_type}}</td>
            <td>{{number_format($transaction->total_charges)}}</td>
            <td>{{optional($transaction->created_at)->format('Y-m-d h:m:s')}}</td>
            <td>{{$transaction->status}}</td>
            <td>{{($transaction->doneBy)->name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
