<html>
<head>
    <title>Receipt</title>
    <style>
        @page { size: 100mm 200mm portrait; }
    </style>
</head>
<body style="margin: 0 !important;">
<main>
    <p style="text-align: center;margin-top: -20px;font-size: 20px; font-weight:300">IPOSITA - IPS</p>
    <p style="text-align: center;margin-top: -10px;font-size: 15px;">PREPAID ELECTRICITY</p> 
    <p style="text-align: center;margin-top: -10px;font-size: 15px;">RECEIPT #{{str_pad($transaction->id,10,"0",STR_PAD_LEFT)}}</p>
    <p style="text-align: center;margin-top: -10px">**********************</p>

    <p style="margin-top: -10px;"><span style="font-size: 12px; font-weight :bold">CUSTOMER INFORMATION </span></p>
    <p style="margin-top: -10px;"><span>{{$transaction->customer_name}}</span></p>
    <p style="margin-top: -12px;"> Meter number : <span>{{$transaction->reference_number}}</span></p>
    {{-- <p style="margin-top: -12px;">Phone number : <span>{{$transaction->customer_phone}}</span></p> --}}
     <br>
    <p style="margin-top: -10px;"><span style="font-size: 12px; font-weight :bold">VEND INFO </span></p>
    <p style="margin-top: -10px;"> VAT : <span>103372638</span> (EUCL)</p>
    <p style="margin-top: -12px;">{{ \Carbon\Carbon::createFromFormat('YmdHis', $transaction->date_from_eucl)->format('M d, Y - H:i:s')}}</p>
     <br>
    {{-- <p style="text-align: center;margin-top: -10px;"><span style="font-size: 16px;font-weight: bold">Service Provider </span></p>
    <p style="text-align: center;margin-top: -16px;">  <span>{{optional($transaction->serviceCharges)->serviceProvider->name??'-'}}</span></p>
    <p style="text-align: center;margin-top: -10px;"><span style="font-size: 16px;font-weight: bold">Service</span></p>
    <p style="text-align: center;margin-top: -16px;"> <span>{{optional($transaction->serviceCharges)->service->name??'-'}}</span></p>
    <p style="text-align: center;margin-top: -10px;"><span style="font-size: 16px;font-weight: bold">Reference No</span></p>
    <p style="text-align: center;margin-top: -16px;"> <span>{{$transaction->reference_number}}</span></p> --}}
    @if($transaction->token)
        @if ($transaction->token_p31 != null)
        <p style="text-align: center;margin-top: -16px;font-size: 15px;">TOKEN 1: <span>{{$transaction->token}}</span></p> 
        <p style="text-align: center;margin-top: -16px;font-size: 15px;">TOKEN 2: <span>{{$transaction->token_p31}}</span></p> 
        <p style="text-align: center;margin-top: -16px;font-size: 15px;">TOKEN 3: <span>{{$transaction->token_p32}}</span></p> 
        @else        
        <p style="text-align: center;margin-top: -10px;"><span style="font-size: 14px;font-weight: bold">TOKEN</span></p>
        <p style="text-align: center;margin-top: -16px;font-size: 20px;"> <span>{{$transaction->token}}</span></p>
        @endif
    <p style="text-align: center;margin-top: -20px">------------------------------------</p>
        <p style="font-size: 18px;">Total units <span style="float: right;">{{round($transaction->units,1)}} Kwh</span></p>
        <p style="font-size: 18px;margin-top: -16px;">Electricity <span style="float: right;"> {{number_format($transaction->electricity,3)}} RWF</span></p>
        <p style="font-size: 18px;margin-top: -16px;">TVA @ 18 % <span style="float: right;">{{number_format($transaction->tva,3)}}  RWF</span></p>
        <p style="font-size: 18px;margin-top: -16px;">Regulatory fees @ 0.3%<span style="float: right;">{{number_format($transaction->fees,3)}}  RWF</span></p>
        <p style="font-size: 18px;margin-top: -16px;">TOTAL TTC<span style="float: right;">{{number_format($transaction->amount)}} RWF</span></p>
    @endif
    <p style=""><span style="font-weight :bold">Agent :</span> {{ $transaction->user->name }}</p>
    <p style="margin-top: -16px;"><span style="font-weight :bold">Agent Contact:</span> {{ $transaction->user->telephone }}</p>


    <p style="text-align: center;">*******************************</p>
    <p style="text-align: center;font-size: 14px;margin-top: -16px;">** THANK YOU ** MURAKOZE **</p>
    <p style="text-align: center;margin-top: -10px;">*******************************</p>
{{--    <div>{!! DNS1D::getBarcodeHTML('4445645656', 'POSTNET') !!}</div>--}}
    {{-- <div style="text-align: center !important;">{!! DNS1D::getBarcodeHTML($transaction->reference_number.$transaction->id, 'PHARMA') !!}</div> --}}
{{--    <div style="margin-left: -40px">{!! DNS1D::getBarcodeHTML('4445645656', 'C39') !!}</div>--}}
{{--    <img src="data:image/png;base64,'{{DNS1D::getBarcodePNG($transaction->reference_number.$transaction->id, 'C39',3,33,array(1,1,1), true) }} '" alt="barcode"   />--}}
{{--    <div style="height: 50px!important;">{!! DNS2D::getBarcodeHTML('4445645656', 'QRCODE') !!}</div></br>--}}

</main>

</body>
</html>
