<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TestController extends Controller
{
    public function testTestQuery()
    {

        $isExternalBranch = User::find(2)->branch && User::find(2)->branch->is_external;

        $services = Service::query()->when($isExternalBranch, function (Builder $builder) {
            return $builder->whereIn("id", User::find(2)->branch->services->pluck("id"));
        })->get();

        $userss = auth()->user();
        $isExternalBranch = User::find(2)->branch;

//        $services=Service::query()->when($isExternalBranch,function (Builder $builder){
        //            return $builder->whereIn("id",auth()->user()->branch->services->pluck("id"));
        //        })->get();
        //        echo $isExternalBranch;
        echo $services;
    }
    public function testTestLogin(Request $request)
    {

        $todayDate = Carbon::now()->format('YmdHim');
        $uuid = Str::orderedUuid();

        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2",
                "h2" => "VL00",
                "h3" => $uuid,
                "h4" => "iposita",
                "h5" => $this->password,
                "h6" => "RW3500010001000100160903",
                "h7" => "Laptop",
                "h8" => "DB4N0Q1",
                "h9" => "14:fe:b5:ae:6e:2c",
                "h10" => "10.10.82.118",
                "h11" => $todayDate,
                "h12" => "IPOSITA Vending System",
                "h13" => "1.0.0",
                "h14" => "rw"],
                "body" => []],
        ];

        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";

        $response2 = Http::withoutVerifying()->post($url, $data);

        if ($response2->ok()) {
            $json_data = json_decode($response2);
            if ($json_data->response->body) {

                return \response()->json($json_data->response->body, 200);
            } else {
                return \response()->json([
                    'messagess' => "Wrong Credition",
                ], 200);
            }
        } else {
            return \response()->json(['messagess' => "server not reachable ",
            ], 500);
        }
    }
    public function testTestCheckMete(Request $request)
    {

        $uuid = Str::orderedUuid();

        $todayDate = Carbon::now()->format('YmdHim');
        $uuid = Str::orderedUuid();
        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2",
                "h2" => "CC04",
                "h3" => $uuid,
                "h4" => "iposita",
                "h5" => $this->password,
                "h6" => "RW3500010001000100160903",
                "h7" => "Laptop",
                "h8" => "DB4N0Q1",
                "h9" => "14:fe:b5:ae:6e:2c",
                "h10" => "10.10.82.118",
                "h11" => $todayDate,
                "h12" => "IPOSITA Vending System",
                "h13" => "1.0.0",
                "h14" => "rw"],
                "body" => [["p0" => $request->meter]]],
        ];

        // echo json_encode($data);
        // die();

        // $url = config('services.IPOSITA_EUCL_URL'). "/vendor.ws";
        // https://pvs.reg.rw/prod:443
        $response2 = Http::withoutVerifying()->post('https://10.20.120.128:443/prod/vendor.ws', $data);

        if ($response2->ok()) {
            $json_data = json_decode($response2);
            if ($json_data->response->body) {
                return \response()->json([
                    'message' => $json_data->response->body[0]->p2,
                ], );
            } else {
                return \response()->json([
                    'message' => "notFound",
                ]);
            }
        } else {
            return \response()->json([
                'meter_number' => $request->meter,
                'message' => "server not reachable ",
            ]);
        }

    }
    public function testTestBuy(Request $request)
    {

        $uuid = Str::orderedUuid();
        $todayDate = Carbon::now()->format('YmdHim');
        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2",
                "h2" => "PC05",
                "h3" => $uuid,
                "h4" => "iposita",
                "h5" => $this->password,
                "h6" => "RW3500010001000100160903",
                "h7" => "Laptop",
                "h8" => "DB4N0Q1",
                "h9" => "14:fe:b5:ae:6e:2c",
                "h10" => "10.10.82.118",
                "h11" => $todayDate,
                "h12" => "IPOSITA Vending System",
                "h13" => "1.0.0",
                "h14" => "rw"],
                "body" => [["p0" => $request->meter,
                    "p1" => $request->amount,

                ]]],
        ];

        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";
        //       echo $url;

        $response2 = Http::withoutVerifying()->post($url, $data);
        if ($response2->ok()) {
            $json_data = json_decode($response2);
            if ($json_data->response->body) {
                return \response()->json($json_data->response->body[0], 200);
            } else {
                return \response()->json("notFound", 200);
            }
        }
    }
    public function testReceiptCopy(Request $request)
    {

        $todayDate = Carbon::now()->format('YmdHim');
        $uuid = Str::orderedUuid();
        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2",
                "h2" => "RC07",
                "h3" => $uuid,
                "h4" => "iposita",
                "h5" => $this->password,
                "h6" => "RW3500010001000100160903",
                "h7" => "Laptop",
                "h8" => "DB4N0Q1",
                "h9" => "14:fe:b5:ae:6e:2c",
                "h10" => "10.10.82.118",
                "h11" => $todayDate,
                "h12" => "IPOSITA Vending System",
                "h13" => "1.0.0",
                "h14" => "rw"],
                "body" => [["p0" => $request->receipt_number]]],
        ];

        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";

        $response2 = Http::withoutVerifying()->post($url, $data);
        // echo $response2;
        if ($response2->ok()) {
            $json_data = json_decode($response2);
            if ($json_data->response->body) {
                return \response()->json($json_data->response->body[0], 200);
            } else {
                return \response()->json([
                    'messagess' => "Meter number not found",
                ], 200);
            }
        } else {
            return \response()->json([
                'messagess' => "server not reachable ",
            ], 200);
        }
    }
    public function testPaymentRetry(Request $request)
    {

        $todayDate = Carbon::now()->format('YmdHim');
        $uuid = Str::orderedUuid();
        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2",
                "h2" => "PR06",
                "h3" => $uuid,
                "h4" => "iposita",
                "h5" => $this->password,
                "h6" => "RW8400010001000100150903",
                "h7" => "Laptop",
                "h8" => "DB4N0Q1",
                "h9" => "14:fe:b5:ae:6e:2c",
                "h10" => "10.10.82.118",
                "h11" => $todayDate,
                "h12" => "IPOSITA Vending System",
                "h13" => "1.0.0",
                "h14" => "rw"],
                "body" => [["p0" => $request->request_id]]],
        ];

        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";
        $response2 = Http::withoutVerifying()->post($url, $data);
        if ($response2->ok()) {
            $json_data = json_decode($response2);
            if ($json_data->response->body) {
                return \response()->json($json_data->response->body[0], 200);
            } else {
                return \response()->json([
                    'messagess' => "Meter number not found",
                ], 200);
            }
        } else {
            return \response()->json([
                'messagess' => "server not reachable ",
            ], 200);
        }
    }
    public function change_password(Request $request)
    {

        $todayDate = Carbon::now()->format('YmdHim');
        $uuid = Str::orderedUuid();

        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2",
                "h2" => "CP02",
                "h3" => $uuid,
                "h4" => "iposita",
                "h5" => $request->old_password,
                "h6" => "RW8400010001000100150903",
                "h7" => "Laptop",
                "h8" => "DB4N0Q1",
                "h9" => "14:fe:b5:ae:6e:2c",
                "h10" => "10.10.82.118",
                "h11" => $todayDate,
                "h12" => "IPOSITA Vending System",
                "h13" => "1.0.0",
                "h14" => "rw"],
                "body" => [["p0" => $request->old_password,
                    "p1" => $request->new_password, "p2" => $request->confirm_password]]],
        ];

        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";
        //    return response($url);

        $response2 = Http::withoutVerifying()->post($url, $data);

        if ($response2->ok()) {
            $json_data = json_decode($response2);
            if ($json_data->response->body) {

                return \response()->json($json_data->response->body, 200);
            } else {
                return \response()->json([
                    'messagess' => "Not Found",
                ], 200);
            }
        } else {
            return \response()->json(['messagess' => "server not reachable ",
            ], 500);
        }
    }
    public function testTestLogout(Request $request)
    {

        $todayDate = Carbon::now()->format('YmdHim');
        $uuid = Str::orderedUuid();
        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2",
                "h2" => "LO01",
                "h3" => $uuid,
                "h4" => $request->h4,
                "h5" => $request->h5,
                "h6" => "RW8400010001000100150903",
                "h7" => "Laptop",
                "h8" => "DB4N0Q1",
                "h9" => "14:fe:b5:ae:6e:2c",
                "h10" => "10.10.82.118",
                "h11" => $todayDate,
                "h12" => "IPOSITA Vending System",
                "h13" => "1.0.0",
                "h14" => "rw"],
                "body" => []],
        ];

        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";
        //    return response($url);

        $response2 = Http::withoutVerifying()->post($url, $data);
        if ($response2->ok()) {
            $json_data = json_decode($response2);
            if ($json_data->response->body) {
                return \response()->json($json_data->response->body[0], 200);
            } else {
                return \response()->json([
                    'messagess' => "No Response Found",
                ], 400);
            }
        } else {
            return \response()->json([
                'messagess' => "server not reachable ",
            ], 500);
        }
    }
    public function testTestSammary(Request $request)
    {

        // echo $request->all();

        $todayDate = Carbon::now()->format('YmdHim');
        $uuid = Str::orderedUuid();

        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2",
                "h2" => "AS03",
                "h3" => $uuid,
                "h4" => "k8J2",
                "h5" => "T6wjf5bf8m8rni672u0V8sjj",
                "h7" => "Laptop",
                "h8" => "DB4N0Q1",
                "h9" => "14:fe:b5:ae:6e:2c",
                "h10" => "10.10.82.118",
                "h11" => $todayDate,
                "h12" => "IPOSITA Vending System",
                "h13" => "1.0.0",
                "h14" => "rw"],
                "body" => []],
        ];

        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";
        //    return response($url);

        $response2 = Http::withoutVerifying()->post($url, $data);

        if ($response2->ok()) {
            $json_data = json_decode($response2);
            if ($json_data->response->body) {
                return \response()->json($json_data->response->body[0], 200);
            } else {
                return \response()->json([
                    'messagess' => "No Response Found",
                ], 400);
            }
        } else {
            return \response()->json([
                'messagess' => "server not reachable ",
            ], 500);
        }
    }
    public function testAccountHistory(Request $request)
    {
        $todayDate = Carbon::now()->format('YmdHim');
        $uuid = Str::orderedUuid();

        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2",
                "h2" => "VH09",
                "h3" => $uuid,
                "h4" => "iposita",
                "h5" => $this->password,
                "h6" => "RW8400010001000100150903",
                "h7" => "Laptop",
                "h8" => "DB4N0Q1",
                "h9" => "14:fe:b5:ae:6e:2c",
                "h10" => "10.10.82.118",
                "h11" => $todayDate,
                "h12" => "IPOSITA Vending System",
                "h13" => "1.0.0",
                "h14" => "rw"],
                "body" => [["p0" => $request->records]]],
        ];

        // return response()->json($data);
        // die();

        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";
        //   echo $url;

        $response2 = Http::withoutVerifying()->post($url, $data);
        if ($response2->ok()) {
            $json_data = json_decode($response2);
            if ($json_data->response->body) {
                return \response()->json($json_data->response->body, 200);
            } else {
                return \response()->json([
                    'messagess' => "No Response Found",
                ], 400);
            }
        } else {
            return \response()->json([
                'messagess' => "server not reachable ",
            ]);
        }
    }

    public function testPurchaseHistory(Request $request)
    {

        $todayDate = Carbon::now()->format('YmdHim');
        // $po = SysParameter::where('name', '=', 'P0')->first();
        // $p1 = SysParameter::where('name', '=', 'P1')->first();
        $uuid = Str::orderedUuid();
        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2",
                "h2" => "MH08",
                "h3" => $uuid,
                "h4" => "iposita",
                "h5" => $this->password,
                "h6" => "RW8400010001000100150903",
                "h7" => "Laptop",
                "h8" => "DB4N0Q1",
                "h9" => "14:fe:b5:ae:6e:2c",
                "h10" => "10.10.82.118",
                "h11" => $todayDate,
                "h12" => "IPOSITA Vending System",
                "h13" => "1.0.0",
                "h14" => "rw"],
                "body" => [["p0" => $request->meter, "p1" => 3]]],
        ];

        // echo json_encode($data);
        // die();

        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";

        $response2 = Http::withoutVerifying()->post($url, $data);
        if ($response2->ok()) {
            $json_data = json_decode($response2);
            if ($json_data->response->body) {
                return \response()->json($json_data->response->body, 200);
            } else {
                return \response()->json([
                    'messagess' => "Meter number not found",
                ], 200);
            }
        } else {
            return \response()->json([
                'messagess' => "server not reachable ",
            ], 200);
        }
    }
}
