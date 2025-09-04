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
    <p style="text-align: center;margin-top: -10px;font-size: 15px;">RECEIPT #{{$transaction->p14}}</p>
    <p style="text-align: center;margin-top: -10px">**********************</p>

    <p style="margin-top: -10px;"><span style="font-size: 12px; font-weight :bold">CUSTOMER INFORMATION </span></p>
    <p style="margin-top: -10px;"><span>{{$transaction->p2}}</span></p>
    <p style="margin-top: -12px;"> Meter number : <span>{{$transaction->p0}}</span></p>
    {{-- <p style="margin-top: -12px;">Phone number : <span>{{$transaction->customer_phone}}</span></p> --}}
     <br>
    <p style="margin-top: -10px;"><span style="font-size: 12px; font-weight :bold">VEND INFO </span></p>
    <p style="margin-top: -10px;"> VAT : <span>103372638</span> (EUCL)</p>
    <p style="margin-top: -12px;">{{ \Carbon\Carbon::createFromFormat('YmdHis', $transaction->p12)->format('M d, Y - H:i:s')}}</p>
     <br>
    @if($transaction->p30)
        @if ($transaction->p31 != null)
        @php
            $dataa = str_split($transaction->p30, 4);
            $formated_token = $dataa[0] . '-' . $dataa[1] . '-' . $dataa[2] . '-' . $dataa[3] . '-' . $dataa[4];
            $data_p31 = str_split($transaction->p31, 4);
            $formated_token_p31 = $data_p31[0] . '-' . $data_p31[1] . '-' . $data_p31[2] . '-' . $data_p31[3] . '-' . $data_p31[4];
            $data_p32 = str_split($transaction->p32, 4);
            $formated_token_p32 = $data_p32[0] . '-' . $data_p32[1] . '-' . $data_p32[2] . '-' . $data_p32[3] . '-' . $data_p32[4];
        @endphp
        <p style="text-align: center;margin-top: -16px;font-size: 15px;">TOKEN 1: <span>{{$formated_token}}</span></p> 
        <p style="text-align: center;margin-top: -16px;font-size: 15px;">TOKEN 2: <span>{{$formated_token_p31}}</span></p> 
        <p style="text-align: center;margin-top: -16px;font-size: 15px;">TOKEN 3: <span>{{$formated_token_p32}}</span></p> 
        @else   
        @php
             $dataa = str_split($transaction->p30, 4);
            $formated_token = $dataa[0] . '-' . $dataa[1] . '-' . $dataa[2] . '-' . $dataa[3] . '-' . $dataa[4];
        @endphp     
        <p style="text-align: center;margin-top: -10px;"><span style="font-size: 14px;font-weight: bold">TOKEN</span></p>
        <p style="text-align: center;margin-top: -16px;font-size: 20px;"> <span>{{$formated_token}}</span></p>
        @endif
    <p style="text-align: center;margin-top: -20px">------------------------------------</p>
        <p style="font-size: 18px;">Total units <span style="float: right;">{{round($transaction->p25,1)}} Kwh</span></p>
        <p style="font-size: 18px;margin-top: -16px;">Electricity <span style="float: right;"> {{number_format($transaction->p26,3)}} RWF</span></p>
        <p style="font-size: 18px;margin-top: -16px;">TVA @ 18 % <span style="float: right;">{{number_format($transaction->p27,3)}}  RWF</span></p>
        <p style="font-size: 18px;margin-top: -16px;">Regulatory fees @ 0.3%<span style="float: right;">{{number_format($transaction->p90,3)}}  RWF</span></p>
        <p style="font-size: 18px;margin-top: -16px;">TOTAL TTC<span style="float: right;">{{number_format($transaction->p15)}} RWF</span></p>
    @endif
    <p style=""><span style="font-weight :bold">Agent :</span> </p>
    <p style="margin-top: -16px;"><span style="font-weight :bold">Agent Contact:</span> </p>


    <p style="text-align: center;">*******************************</p>
    <p style="text-align: center;font-size: 14px;margin-top: -16px;">** THANK YOU ** MURAKOZE **</p>
    <p style="text-align: center;margin-top: -10px;">*******************************</p>


</main>

</body>
</html>
