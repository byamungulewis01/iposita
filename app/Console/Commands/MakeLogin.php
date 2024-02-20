<?php

namespace App\Console\Commands;

use App\Models\SysParameter;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class MakeLogin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eucl:makeLogin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $todayDate = Carbon::now()->format('YmdHim');
        $data = [
            "request" => ["header"=>["h0"=>"Vendor-WS",
            "h1"=>"1.0.2",
            "h2"=>"VL00",
            "h3"=>"529bd3ed-9153-4aad-ba64-8911806a0b31",
            "h4"=>"iposita",
            "h5"=>"uwlfjsele82c",
            "h6"=>"RW8400010001000100150903",
            "h7"=>"Laptop",
            "h8"=>"DB4N0Q1",
            "h9"=>"14:fe:b5:ae:6e:2c",
            "h10"=>"10.10.82.118",
            "h11"=>$todayDate,
            "h12"=>"IPOSITA Vending System",
            "h13"=>"1.0.0",
            "h14"=>"rw"],
                "body"=> []],
        ];

        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";
        $response = Http::withoutVerifying()->post($url,$data);
        if ($response->ok()){
            $json_data = json_decode($response);
            $paras = SysParameter::updateOrCreate(['name' => 'P0'],
                ['value' => $json_data->response->body[0]->p0]);
            $paras = SysParameter::updateOrCreate(['name' => 'P1'],
                ['value' => $json_data->response->body[0]->p1]);
        }
    }
}
