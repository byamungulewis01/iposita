<html>
<head>
    <title>Receipt</title>
    <style>
        @page { size: 100mm 200mm portrait; }
    </style>
</head>
<body style="margin: 0 !important;">
<main>
    <p style="text-align: center;margin-top: -20px;font-size: 20px;border-bottom: grey solid 1px ">IPOSITA MIS</p>
    <p style="text-align: center;margin-top: -10px;font-size: 20px;">RECEIPT #{{str_pad($transaction->id,10,"0",STR_PAD_LEFT)}}</p>
    <p style="margin-left: -100px;margin-top: -10px">*********************************************************</p>

    <p style="text-align: center;margin-top: -10px;"><span style="font-size: 20px;font-weight: bold">Customer Name </span></p>
    <p style="text-align: center;margin-top: -16px;">  <span>{{$transaction->customer_name}}</span></p>
    <p style="text-align: center;margin-top: -10px;"><span style="font-size: 20px;font-weight: bold">Customer phone</span></p>
    <p style="text-align: center;margin-top: -16px;"> <span>{{$transaction->customer_phone}}</span></p>
    <p style="margin-left: -100px;margin-top: -10px">-----------------------------------------------------------------------------------------------</p>

    <p style="text-align: center;margin-top: -10px;"><span style="font-size: 16px;font-weight: bold">Service Provider </span></p>
    <p style="text-align: center;margin-top: -16px;">  <span>{{optional($transaction->serviceCharges)->serviceProvider->name??'-'}}</span></p>
    <p style="text-align: center;margin-top: -10px;"><span style="font-size: 16px;font-weight: bold">Service</span></p>
    <p style="text-align: center;margin-top: -16px;"> <span>{{optional($transaction->serviceCharges)->service->name??'-'}}</span></p>
    <p style="text-align: center;margin-top: -10px;"><span style="font-size: 16px;font-weight: bold">Reference No</span></p>
    <p style="text-align: center;margin-top: -16px;"> <span>{{$transaction->reference_number}}</span></p>
    @if($transaction->token)
        {{-- <p style="text-align: center;margin-top: -10px;"><span style="font-size: 16px;font-weight: bold">Token</span></p>
        <p style="text-align: center;margin-top: -16px;"> <span>{{$transaction->token}}</span></p> --}}
        @if ($transaction->token_p31 != null)
        <p style="text-align: center;margin-top: -16px;font-size: 15px;">TOKEN 1: <span>{{$transaction->token}}</span></p> 
        <p style="text-align: center;margin-top: -16px;font-size: 15px;">TOKEN 2: <span>{{$transaction->token_p31}}</span></p> 
        <p style="text-align: center;margin-top: -16px;font-size: 15px;">TOKEN 3: <span>{{$transaction->token_p32}}</span></p> 
        @else        
        <p style="text-align: center;margin-top: -10px;"><span style="font-size: 14px;font-weight: bold">TOKEN</span></p>
        <p style="text-align: center;margin-top: -16px;font-size: 20px;"> <span>{{$transaction->token}}</span></p>
        @endif
        <p style="text-align: center;margin-top: -10px;"><span style="font-size: 16px;font-weight: bold">Units</span></p>
        <p style="text-align: center;margin-top: -16px;"> <span>{{number_format($transaction->units,2)}}</span></p>
    @endif
    <p style="text-align: center;margin-top: -10px;"><span style="font-size: 16px;font-weight: bold">Total Amount</span></p>
    <p style="text-align: center;margin-top: -16px;"> <span>{{number_format($transaction->amount)}} RWF</span></p>
    <p style="text-align: center;margin-top: -10px;"> <span>Date:{{$transaction->updated_at->format('Y-m-d H:m')}}</span></p>
    <p style="margin-left: -100px;margin-top: -10px">-----------------------------------------------------------------------------------------------</p>
    <p style="text-align: center;font-size: 20px;">THANK YOU</p>
    <p style="margin-left: -100px">*********************************************************</p>
{{--    <div>{!! DNS1D::getBarcodeHTML('4445645656', 'POSTNET') !!}</div>--}}
    <div style="text-align: center !important;">{!! DNS1D::getBarcodeHTML($transaction->reference_number.$transaction->id, 'PHARMA') !!}</div>
{{--    <div style="margin-left: -40px">{!! DNS1D::getBarcodeHTML('4445645656', 'C39') !!}</div>--}}
{{--    <img src="data:image/png;base64,'{{DNS1D::getBarcodePNG($transaction->reference_number.$transaction->id, 'C39',3,33,array(1,1,1), true) }} '" alt="barcode"   />--}}
{{--    <div style="height: 50px!important;">{!! DNS2D::getBarcodeHTML('4445645656', 'QRCODE') !!}</div></br>--}}

</main>

</body>
</html>
