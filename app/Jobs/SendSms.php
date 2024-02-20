<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SendSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $phone_number;
    private $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($phone_number, $message)
    {
        $this->phone_number = $phone_number;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->attempts() > 1)
            return;

        $response = Http::withoutVerifying()
            ->withOptions(["verify"=>false])
        ->withHeaders([
            'x-api-key' => 'bkVxc3FQQmVtbEJhREtrY25DZW0=',
        ])->post('https://api.mista.io/sms', [
            "to" => "+25".$this->phone_number,
            "from" => "IPOSITA",
            "unicode" => "0",
            "sms" => $this->message,
            "action" => "send-sms"
        ]);

//        $response = Http::post('http://sms.besoft.rw/api/v1/client/bulksms', [
//            "token" => "oe1MNXW6O8GdKmWM3nCSqoVROQSZD31O",
//            "phone" => $this->phone_number,
//            "message" => $this->message,
//            "sender_name" => config('app.name')
//        ]);
    }
}
